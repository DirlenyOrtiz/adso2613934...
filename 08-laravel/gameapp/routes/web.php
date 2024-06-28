<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('catalogue', function () {
    return view('catalogue');
});

Route::get('register', function () {
    return view('register');
});

Route::get('login', function () {
    return view('login');
});
Route::get('dashboard', function () {
    return view('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
/*
Route::get('/dashboard', function () {
    return view('login');
})->middleware(['auth', 'verified'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */


Route::get('/game/show/{id}', function($id){
    $game = App\Models\Game::find($id);
    dd($game->toArray());
});

Route::get('/game/show/{id}', function(){
    $game = App\Models\Game::find(request()->id);
    dd($game->toArray());
});

Route::get('/viewusers', function(){
    $viewusers = App\Models\User::limit(20)->get();
    $code = "<table style='border-collapse: collapse;margin-inline: auto;font-family: Arial'>
                <tr>
                    <th style='background: gray; color: white; padding: 0.4rem'>Id</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Fullname</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Age</th>
                    <th style='background: gray; color: white; padding: 0.4rem'>Created At</th>
                </tr>";
    foreach ($viewusers as $user){
        $code .= "<tr>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->id."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->fullname."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".Carbon\Carbon::parse($user->birthdate)->age."</td>";
        $code .= "<td style='border: 1px solid gray; padding: 0.4rem'>".$user->created_at->diffForHumans()."</td>";
    }
    return $code . "</table>";
});

require __DIR__.'/auth.php';
