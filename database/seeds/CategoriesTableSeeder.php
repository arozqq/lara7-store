<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Jersey',  'Sepatu Bola', 'Sepatu Futsal', 'Sepatu Running', 'Bola', 'Aksesoris']);
        $categories->each(function ($c) {
            \App\Category::create([
                'category_name' => $c,
                'slug' => Str::slug($c),
            ]);
        });
    }
}
