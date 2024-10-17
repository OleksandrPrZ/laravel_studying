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
        $rootCategory = Category::create(['name' => 'Root Category']);
        $childCategory1 = Category::create(['name' => 'Child Category 1', 'parent_id' => $rootCategory->id]);
        $childCategory2 = Category::create(['name' => 'Child Category 2', 'parent_id' => $rootCategory->id]);
        Category::create(['name' => 'Sub Child 1', 'parent_id' => $childCategory1->id]);
        Category::create(['name' => 'Sub Child 2', 'parent_id' => $childCategory2->id]);
    }
}
