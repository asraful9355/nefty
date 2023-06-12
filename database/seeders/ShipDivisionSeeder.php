<?php

namespace Database\Seeders;

use App\Models\ShipDivision;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ShipDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DivisionArray = [
            'Barisal',
            'Chittagong',
            'Dhaka',
            'Khulna',
            'Mymensingh',
            'Rajshahi',
            'Rangpur',
            'Sylhet',

        ];
        foreach ($DivisionArray as $Division) {
            Shipdivision::updateOrCreate([
                'division_name' => $Division,
                'created_at' => Carbon::now(),
            ]);
        }
    }
}


