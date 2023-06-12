<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LiterArray = [
            '1 Ltr',
            '2 Ltr',
            '5 Ltr',
            '10 Ltr',
        ];
        $SleeveArray = [
            'Bell sleeves',
            'Cap sleeves',
            'Raglan sleeves',
            'Flutter sleeves',
        ];
        $FabricArray = [
            'Chenille',
            'Cotton',
            'Georgette',
            'Crêpe',
            'Canvas',
        ];
        $SizeArray = [
            'M',
            'L',
            'XL',
            'XXL',
            'S',
            '64GB',
            '128GB',
            '512GB',
            '1TB',
            '4/64 GB',
            '4/128 GB',
            '8/256 GB',
            '6/128 GB',
        ];

        // Liter
        $Liter_id = Attribute::where('name', 'Liter')->select('id')->first();
        foreach ($LiterArray as $Liter) {
            AttributeValue::updateOrCreate([
                'attribute_id' => $Liter_id->id,
                'value' => $Liter,
                'created_by' => 1,
            ]);
        }

        // Sleeve
        $Sleeve_id = Attribute::where('name', 'Sleeve')->select('id')->first();
        foreach ($SleeveArray as $Sleeve) {
            AttributeValue::updateOrCreate([
                'attribute_id' => $Sleeve_id->id,
                'value' => $Sleeve,
                'created_by' => 1,
            ]);
        }

        // Fabric
        $Fabric_id = Attribute::where('name', 'Fabric')->select('id')->first();
        foreach ($FabricArray as $Fabric) {
            AttributeValue::updateOrCreate([
                'attribute_id' => $Fabric_id->id,
                'value' => $Fabric,
                'created_by' => 1,
            ]);
        }

        // Size
        $Size_id = Attribute::where('name', 'Size')->select('id')->first();
        foreach ($SizeArray as $Size) {
            AttributeValue::updateOrCreate([
                'attribute_id' => $Size_id->id,
                'value' => $Size,
                'created_by' => 1,
            ]);
        }
    }
}

