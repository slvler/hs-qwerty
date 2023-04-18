<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'parent' => '0',
            'title' => 'Shoe'
        ]);
        Category::create([
            'parent' => '0',
            'title' => 'Clothes'
        ]);
        Category::create([
            'parent' => '0',
            'title' => 'Shirt'
        ]);
        Category::create([
            'parent' => '0',
            'title' => 'Sweater'
        ]);
    }
}
