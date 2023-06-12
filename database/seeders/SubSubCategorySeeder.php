<?php

namespace Database\Seeders;


use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\Subsubcategory;
use Illuminate\Database\Seeder;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FashionArray = [
            'Casual T-Shirts',
            'Formal Shirts',
            'Jackets',
            'Dresses',
            'Sneakers',
            'Delts',
            'Sports Shoes',
        ];
        $ElectronicsArray = [
            'Mobile',
            'Laptops',
            'Macbook',
            'Televisions',
            'Lighting',
            'Smart Watch',
            'Galaxy Phones',
            'PC Monitors',
        ];

        // FashionArray
        $SubCategory = Subcategory::where('subcategory_name_en', 'Fashion')->select('id', 'category_id')->first();
        foreach ($FashionArray as $Fashion) {
            Subsubcategory::updateOrCreate([
                'category_id' => $SubCategory->category_id,
                'subcategory_id' => $SubCategory->id,
                'sub_subcategory_name_en' => $Fashion,
                'sub_subcategory_name_bn' => $Fashion,
                'slug' => Str::slug($Fashion)
            ]);
        }

        // ElectronicsArray
        $SubCategory_el = Subcategory::where('subcategory_name_en', 'Electronics')->select('id', 'category_id')->first();
        foreach ($ElectronicsArray as $Electronics) {
            Subsubcategory::updateOrCreate([
                'category_id' => $SubCategory_el->category_id,
                'subcategory_id' => $SubCategory_el->id,
                'sub_subcategory_name_en' => $Electronics,
                'sub_subcategory_name_bn' => $Electronics,
                'slug' => Str::slug($Electronics)
            ]);
        }
    }
}
