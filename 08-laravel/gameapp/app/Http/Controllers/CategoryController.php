<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index()
    {
        // $users = User::all();
        $categories = Category::paginate(20);
        return view('categories.index')->with('categories', $categories);
    }
    public function create()
    {
        return view('categories.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
    //  dd($request->all());

        //Upload file
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
        }
        //new Category
        $category = new Category;
        $category->name = $request->name;
        $category->manufacturer = $request->manufacturer;
        $category->releasedate = $request->releasedate;
        $category->image = $image;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('categories')
                ->with('message', 'The category: ' . $category->name . ' was successfully added!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // dd($user->toArray());
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    // Validación de los datos
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Manejo de la imagen
    if ($request->hasFile('photo')) {
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);
        $category->image = $imageName;
    }

    // Actualización de los campos
    $category->name = $request->name;
    $category->description = $request->description;

    if ($category->save()) {
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to update category.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect('categories')
                ->with('message', 'The category: ' . $category->name . ' was successfully deleted!');
        }
    }
    public function search(Request $request)
{
    $searchTerm = $request->input('q');
    $categories = Category::where('name', 'LIKE', '%' . $searchTerm . '%')->paginate(20);

    return view('categories.search', compact('categories'));
}

}
