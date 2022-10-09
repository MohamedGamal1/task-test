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
        //
        Category::create([
            'name' => 'Video Games',
            'status' => 'published'
        ]);
        Category::create([
            'name' => 'Games',
            'status' => 'published'
        ]);
        Category::create([
            'name' => 'Phones',
            'status' => 'published'
        ]);
    }
}
