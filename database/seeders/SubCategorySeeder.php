<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CategoryArray = [
            'Fashion',
            'Electronics',
        ];

        // Liter
        $Category_id = Category::where('category_name_en', 'Category')->select('id')->first();
        foreach ($CategoryArray as $category) {
            Subcategory::updateOrCreate([
                'category_id' => $Category_id->id,
                'subcategory_name_en' => $category,
                'subcategory_name_bn' => $category,
                'slug' => Str::slug($category)
            ]);
        }
    }
}
