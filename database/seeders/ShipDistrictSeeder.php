<?php

namespace Database\Seeders;

use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ShipDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Barisal District
        $Barisals = [
            'Barisal',
            'Barguna',
            'Bhola',
            'Jhalokati',
            'Patuakhali',
            'Pirojpur',

        ];
        $Barisals_divi = ShipDivision::where('division_name', 'Barisal')->select('id')->first();
        foreach ($Barisals as $Barisal) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Barisals_divi->id,
                'district_name' => $Barisal,
                'created_at' => Carbon::now(),
            ]);
        }

        // Chittagong District
        $Chittagongs = [
            'Bandarban',
            'Brahmanbaria',
            'Chandpur',
            'Chittagong',
            'Comilla',
            "Cox's Bazar",
            'Feni',
            'Khagrachari',
            'Lakshmipur',
            'Noakhali',
            'Rangamati',

        ];
        $Chittagong_divi = ShipDivision::where('division_name', 'Chittagong')->select('id')->first();
        foreach ($Chittagongs as $Chittagong) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Chittagong_divi->id,
                'district_name' => $Chittagong,
                'created_at' => Carbon::now(),
            ]);
        }

        // Dhaka District
        $Dhaka_array = [
            'Dhaka',
            'Faridpur',
            'Gazipur',
            'Gopalganj',
            'Jamalpur',
            'Kishoreganj',
            'Madaripur',
            'Manikganj',
            'Munshiganj',
            'Mymensingh',
            'Narayanganj',
            'Narsingdi',
            'Netrokona',
            'Rajbari',
            'Shariatpur',
            'Sherpur',
            'Tangail',

        ];
        $Dhaka_divi = ShipDivision::where('division_name', 'Dhaka')->select('id')->first();
        foreach ($Dhaka_array as $Dhaka) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Dhaka_divi->id,
                'district_name' => $Dhaka,
                'created_at' => Carbon::now(),
            ]);
        }

        // Khulna District
        $Khulna_array = [
            'Bagerhat',
            'Chuadanga',
            'Jessore',
            'Jhenaidah',
            'Khulna',
            'Kushtia',
            'Magura',
            'Meherpur',
            'Narail',
            'Satkhira',

        ];
        $Khulna_divi = ShipDivision::where('division_name', 'Khulna')->select('id')->first();
        foreach ($Khulna_array as $Khulna) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Khulna_divi->id,
                'district_name' => $Khulna,
                'created_at' => Carbon::now(),
            ]);
        }

        // Mymensingh District
        $Mymensingh_array = [
            'Jamalpur',
            'Mymensingh',
            'Netrokona',
            'Sherpur',

        ];
        $Mymensingh_divi = ShipDivision::where('division_name', 'Mymensingh')->select('id')->first();
        foreach ($Mymensingh_array as $Mymensingh) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Mymensingh_divi->id,
                'district_name' => $Mymensingh,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rajshahi District
        $Rajshahi_array = [
            'Bogra',
            'Chapainawabganj',
            'Joypurhat',
            'Naogaon',
            'Natore',
            'Pabna',
            'Rajshahi',
            'Sirajganj',

        ];
        $Rajshahi_divi = ShipDivision::where('division_name', 'Rajshahi')->select('id')->first();
        foreach ($Rajshahi_array as $Rajshahi) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Rajshahi_divi->id,
                'district_name' => $Rajshahi,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rangpur District
        $Rangpur_array = [
            'Dinajpur',
            'Gaibandha',
            'Kurigram',
            'Lalmonirhat',
            'Nilphamari',
            'Panchagarh',
            'Rangpur',
            'Thakurgaon',

        ];
        $Rangpur_divi = ShipDivision::where('division_name', 'Rangpur')->select('id')->first();
        foreach ($Rangpur_array as $Rangpur) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Rangpur_divi->id,
                'district_name' => $Rangpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sylhet District
        $Sylhet_array = [
            'Habiganj',
            'Moulvibazar',
            'Sunamganj',
            'Sylhet',
        ];
        $Sylhet_divi = ShipDivision::where('division_name', 'Sylhet')->select('id')->first();
        foreach ($Sylhet_array as $Sylhet) {
            ShipDistricts::updateOrCreate([
                'shipdivision_id' => $Sylhet_divi->id,
                'district_name' => $Sylhet,
                'created_at' => Carbon::now(),
            ]);
        }


    }
}
