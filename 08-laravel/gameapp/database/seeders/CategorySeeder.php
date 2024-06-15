<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.*
     */
    public function run(): void
    {
        // Creación de categorías ficticias por arreglos
        Category::create([
            'name' => 'Nitendo Switch',
            'manufacturer' => 'Nitendo',
            'releasedate' => '2017-03-03',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Category::create([
            'name' => 'Xbox Series X',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2020-11-10',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Category::create([
            'name' => 'Play Station 5',
            'manufacturer' => 'Sony',
            'releasedate' => '2020-11-12',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Category::create([
            'name' => 'Xbox Series S',
            'manufacturer' => 'Microsoft',
            'releasedate' => '2020-11-10',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);
        Category::create([
            'name' => 'Play Station 3',
            'manufacturer' => 'Sony',
            'releasedate' => '2020-11-12',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);
        // Creacion de categorias por el metodo ORM
    }
}

