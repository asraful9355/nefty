<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AttributeArray = [
            'Liter',
            'Sleeve',
            'Fabric',
            'Size',
        ];

        foreach ($AttributeArray as  $Attribute) {
            Attribute::updateOrCreate([
                'name' => $Attribute,
                'created_by' => 1,
            ]);
        }
    }
}

