<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'computers',
        ]);

        Category::factory()->create([
            'name' => 'cars',
        ]);

        Category::factory()->create([
            'name' => 'computer`s car',
        ]);
    }
}
