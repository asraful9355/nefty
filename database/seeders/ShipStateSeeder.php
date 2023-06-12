<?php

namespace Database\Seeders;

use App\Models\ShipDistricts;
use App\Models\ShipStates;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ShipStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Barisal Upazilas
        $Barisal_array = [
            'Agailjhara',
            'Babuganj',
            'Bakerganj',
            'Banaripara',
            'Gaurnadi',
            'Hizla',
            'Mehendiganj',
            'Muladi',
            'Wazirpur',
        ];
        $Barisal_district = ShipDistricts::where('district_name', 'Barisal')->select('id', 'shipdivision_id')->first();
        foreach ($Barisal_array as $Barisal) {
            ShipStates::insert([
                'shipdivision_id' => $Barisal_district->shipdivision_id,
                'shipdistrict_id' => $Barisal_district->id,
                'state_name' => $Barisal,
                'created_at' => Carbon::now(),
            ]);
        }

        // Barguna Upazilas
        $Barguna_array = [
            'Amtali',
            'Bamna',
            'Barguna Sadar',
            'Betagi',
            'Patharghata',
            'Taltoli',
        ];
        $Barguna_district = ShipDistricts::where('district_name', 'Barguna')->select('id', 'shipdivision_id')->first();
        foreach ($Barguna_array as $Barguna) {
            ShipStates::insert([
                'shipdivision_id' => $Barguna_district->shipdivision_id,
                'shipdistrict_id' => $Barguna_district->id,
                'state_name' => $Barguna,
                'created_at' => Carbon::now(),
            ]);
        }

        // Bhola Upazilas
        $Bhola_array = [
            'Bhola Sadar',
            'Burhanuddin',
            'Char Fasson',
            'Daulatkhan',
            'Lalmohan',
            'Manpura',
            'Tazumuddin',
        ];
        $Bhola_district = ShipDistricts::where('district_name', 'Bhola')->select('id', 'shipdivision_id')->first();
        foreach ($Bhola_array as $Bhola) {
            ShipStates::insert([
                'shipdivision_id' => $Bhola_district->shipdivision_id,
                'shipdistrict_id' => $Bhola_district->id,
                'state_name' => $Bhola,
                'created_at' => Carbon::now(),
            ]);
        }

        // Jhalokati Upazilas
        $Jhalokati_array = [
            'Jhalokati Sadar',
            'Kathalia',
            'Nalchity',
            'Rajapur',
        ];
        $Jhalokati_district = ShipDistricts::where('district_name', 'Jhalokati')->select('id', 'shipdivision_id')->first();
        foreach ($Jhalokati_array as $Jhalokati) {
            ShipStates::insert([
                'shipdivision_id' => $Jhalokati_district->shipdivision_id,
                'shipdistrict_id' => $Jhalokati_district->id,
                'state_name' => $Jhalokati,
                'created_at' => Carbon::now(),
            ]);
        }

        // Patuakhali Upazilas
        $Patuakhali_array = [
            'Bauphal',
            'Dasmina',
            'Galachipa',
            'Kala Para',
            'Mirzaganj',
            'Patuakhali Sadar',
            'Rangabali',
        ];
        $Patuakhali_district = ShipDistricts::where('district_name', 'Patuakhali')->select('id', 'shipdivision_id')->first();
        foreach ($Patuakhali_array as $Patuakhali) {
            ShipStates::insert([
                'shipdivision_id' => $Patuakhali_district->shipdivision_id,
                'shipdistrict_id' => $Patuakhali_district->id,
                'state_name' => $Patuakhali,
                'created_at' => Carbon::now(),
            ]);
        }

        // Pirojpur Upazilas
        $Pirojpur_array = [
            'Bhandaria',
            'Kawkhali',
            'Mathbaria',
            'Nazirpur',
            'Nesarabad (Swarupkathi)',
            'Pirojpur Sadar',

        ];
        $Pirojpur_district = ShipDistricts::where('district_name', 'Pirojpur')->select('id', 'shipdivision_id')->first();
        foreach ($Pirojpur_array as $Pirojpur) {
            ShipStates::insert([
                'shipdivision_id' => $Pirojpur_district->shipdivision_id,
                'shipdistrict_id' => $Pirojpur_district->id,
                'state_name' => $Pirojpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Bandarban Upazilas
        $Bandarban_array = [
            'Alikadam',
            'Bandarban Sadar',
            'Lama',
            'Naikhongchhari',
            'Rowangchhari',
            'Ruma',
            'Thanchi',

        ];
        $Bandarban_district = ShipDistricts::where('district_name', 'Bandarban')->select('id', 'shipdivision_id')->first();
        foreach ($Bandarban_array as $Bandarban) {
            ShipStates::insert([
                'shipdivision_id' => $Bandarban_district->shipdivision_id,
                'shipdistrict_id' => $Bandarban_district->id,
                'state_name' => $Bandarban,
                'created_at' => Carbon::now(),
            ]);
        }

        // Brahmanbaria Upazilas
        $Brahmanbaria_array = [
            'Akhaura',
            'Bancharampur',
            'Bijoynagar',
            'Brahmanbaria Sadar',
            'Kasba',
            'Nabinagar',
            'Nasirnagar',
            'Sarail',

        ];
        $Brahmanbaria_district = ShipDistricts::where('district_name', 'Brahmanbaria')->select('id', 'shipdivision_id')->first();
        foreach ($Brahmanbaria_array as $Brahmanbaria) {
            ShipStates::insert([
                'shipdivision_id' => $Brahmanbaria_district->shipdivision_id,
                'shipdistrict_id' => $Brahmanbaria_district->id,
                'state_name' => $Brahmanbaria,
                'created_at' => Carbon::now(),
            ]);
        }

        // Chandpur Upazilas
        $Chandpur_array = [
            'Chandpur Sadar',
            'Faridganj',
            'Hajiganj',
            'Hayemchar',
            'Kachua',
            'Matlab Dakshin',
            'Matlab Uttar',
            'Shahrasti',

        ];
        $Chandpur_district = ShipDistricts::where('district_name', 'Chandpur')->select('id', 'shipdivision_id')->first();
        foreach ($Chandpur_array as $Chandpur) {
            ShipStates::insert([
                'shipdivision_id' => $Chandpur_district->shipdivision_id,
                'shipdistrict_id' => $Chandpur_district->id,
                'state_name' => $Chandpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Chittagong Upazilas
        $Chittagong_array = [
            'Anwara',
            'Banshkhali',
            'Boalkhali',
            'Chandanaish',
            'Fatikchhari',
            'Hathazari',
            'Lohagara',
            'Mirsharai',
            'Patiya',
            'Rangunia',
            'Raozan',
            'Sandwip',
            'Satkania',
            'Sitakunda',

        ];
        $Chittagong_district = ShipDistricts::where('district_name', 'Chittagong')->select('id', 'shipdivision_id')->first();
        foreach ($Chittagong_array as $Chittagong) {
            ShipStates::insert([
                'shipdivision_id' => $Chittagong_district->shipdivision_id,
                'shipdistrict_id' => $Chittagong_district->id,
                'state_name' => $Chittagong,
                'created_at' => Carbon::now(),
            ]);
        }

        // Comilla Upazilas
        $Comilla_array = [
            'Barura',
            'Brahmanpara',
            'Burichong',
            'Chandina',
            'Chauddagram',
            'Daudkandi',
            'Debidwar',
            'Homna',
            'Laksam',
            'Muradnagar',
            'Nangalkot',
            'Comilla Sadar Dakshin',
            'Comilla Sadar Uttar',
            'Meghna',
            'Monohorganj',
            'Titas',

        ];
        $Comilla_district = ShipDistricts::where('district_name', 'Comilla')->select('id', 'shipdivision_id')->first();
        foreach ($Comilla_array as $Comilla) {
            ShipStates::insert([
                'shipdivision_id' => $Comilla_district->shipdivision_id,
                'shipdistrict_id' => $Comilla_district->id,
                'state_name' => $Comilla,
                'created_at' => Carbon::now(),
            ]);
        }

        // Cox's Bazar Upazilas
        $Coxs_Bazar_array = [
            "Chakaria",
            "Cox's Bazar Sadar",
            'Kutubdia',
            'Maheshkhali',
            'Pekua',
            'Ramu',
            'Teknaf',
            'Ukhia',

        ];
        $Coxs_Bazar_district = ShipDistricts::where("district_name", "Cox's Bazar")->select('id', 'shipdivision_id')->first();
        foreach ($Coxs_Bazar_array as $Coxs_Bazar) {
            ShipStates::insert([
                'shipdivision_id' => $Coxs_Bazar_district->shipdivision_id,
                'shipdistrict_id' => $Coxs_Bazar_district->id,
                'state_name' => $Coxs_Bazar,
                'created_at' => Carbon::now(),
            ]);
        }

        // Feni Upazilas
        $Feni_array = [
            'Chhagalnaiya',
            'Daganbhuiyan',
            'Feni Sadar',
            'Parshuram',
            'Sonagazi',

        ];
        $Feni_district = ShipDistricts::where('district_name', 'Feni')->select('id', 'shipdivision_id')->first();
        foreach ($Feni_array as $Feni) {
            ShipStates::insert([
                'shipdivision_id' => $Feni_district->shipdivision_id,
                'shipdistrict_id' => $Feni_district->id,
                'state_name' => $Feni,
                'created_at' => Carbon::now(),
            ]);
        }

        // Khagrachari Upazilas
        $Khagrachari_array = [
            'Dighinala',
            'Khagrachari Sadar',
            'Lakshmichhari',
            'Mahalchhari',
            'Manikchhari',
            'Matiranga',
            'Panchhari',
            'Ramgarh',

        ];
        $Khagrachari_district = ShipDistricts::where('district_name', 'Khagrachari')->select('id', 'shipdivision_id')->first();
        foreach ($Khagrachari_array as $Khagrachari) {
            ShipStates::insert([
                'shipdivision_id' => $Khagrachari_district->shipdivision_id,
                'shipdistrict_id' => $Khagrachari_district->id,
                'state_name' => $Khagrachari,
                'created_at' => Carbon::now(),
            ]);
        }

        // Lakshmipur Upazilas
        $Lakshmipur_array = [
            'Char Alexgander',
            'Kamalnagar',
            'Lakshmipur Sadar',
            'Raipur',
            'Ramganj',
            'Ramgati',

        ];
        $Lakshmipur_district = ShipDistricts::where('district_name', 'Lakshmipur')->select('id', 'shipdivision_id')->first();
        foreach ($Lakshmipur_array as $Lakshmipur) {
            ShipStates::insert([
                'shipdivision_id' => $Lakshmipur_district->shipdivision_id,
                'shipdistrict_id' => $Lakshmipur_district->id,
                'state_name' => $Lakshmipur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Noakhali Upazilas
        $Noakhali_array = [
            'Begumganj',
            'Chatkhil',
            'Companiganj',
            'Hatiya',
            'Kabirhat',
            'Senbagh',
            'Sonaimuri',
            'Subarnachar',
            'Noakhali Sadar',

        ];
        $Noakhali_district = ShipDistricts::where('district_name', 'Noakhali')->select('id', 'shipdivision_id')->first();
        foreach ($Noakhali_array as $Noakhali) {
            ShipStates::insert([
                'shipdivision_id' => $Noakhali_district->shipdivision_id,
                'shipdistrict_id' => $Noakhali_district->id,
                'state_name' => $Noakhali,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rangamati Upazilas
        $Rangamati_array = [
            'Baghaichhari',
            'Barkal',
            'Kawkhali',
            'Belai Chhari',
            'Langadu',
            'Naniarchar',
            'Rajasthali',
            'Rangamati Sadar',

        ];
        $Rangamati_district = ShipDistricts::where('district_name', 'Rangamati')->select('id', 'shipdivision_id')->first();
        foreach ($Rangamati_array as $Rangamati) {
            ShipStates::insert([
                'shipdivision_id' => $Rangamati_district->shipdivision_id,
                'shipdistrict_id' => $Rangamati_district->id,
                'state_name' => $Rangamati,
                'created_at' => Carbon::now(),
            ]);
        }

        // Dhaka Upazilas
        $Dhaka_array = [
            'Dhaka Cantonment',
            'Dhamrai',
            'Dohar',
            'Keraniganj',
            'Nawabganj',
            'Savar',
            'Gazipur Sadar',
            'Kaliakair',
            'Kaliganj',
            'Kapasia',
            'Sreepur',
            'Munshiganj Sadar',
            'Gazaria',
            'Lohajang',
            'Sirajdikhan',
            'Tongi',
            'Dhanmondi',
            'Gulshan',
            'Mirpur',
            'Mohammadpur',
            'Uttara',
            'Demra',
            'Kotwali',
            'Lalbagh',
            'New Market',
            'Pallabi',
            'Ramna',
            'Shah Ali',
            'Shahbag',
            'Tejgaon',

        ];
        $Dhaka_district = ShipDistricts::where('district_name', 'Dhaka')->select('id', 'shipdivision_id')->first();
        foreach ($Dhaka_array as $Dhaka) {
            ShipStates::insert([
                'shipdivision_id' => $Dhaka_district->shipdivision_id,
                'shipdistrict_id' => $Dhaka_district->id,
                'state_name' => $Dhaka,
                'created_at' => Carbon::now(),
            ]);
        }

        // Faridpur Upazilas
        $Faridpur_array = [
            'Alfadanga',
            'Bhanga',
            'Boalmari',
            'Charbhadrasan',
            'Faridpur Sadar',
            'Madhukhali',
            'Nagarkanda',
            'Sadarpur',
            'Saltha',

        ];
        $Faridpur_district = ShipDistricts::where('district_name', 'Faridpur')->select('id', 'shipdivision_id')->first();
        foreach ($Faridpur_array as $Faridpur) {
            ShipStates::insert([
                'shipdivision_id' => $Faridpur_district->shipdivision_id,
                'shipdistrict_id' => $Faridpur_district->id,
                'state_name' => $Faridpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Gazipur Upazilas
        $Gazipur_array = [
            'Gazipur Sadar',
            'Kaliakair',
            'Kaliganj',
            'Kapasia',
            'Sreepur',

        ];
        $Gazipur_district = ShipDistricts::where('district_name', 'Gazipur')->select('id', 'shipdivision_id')->first();
        foreach ($Gazipur_array as $Gazipur) {
            ShipStates::insert([
                'shipdivision_id' => $Gazipur_district->shipdivision_id,
                'shipdistrict_id' => $Gazipur_district->id,
                'state_name' => $Gazipur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Gopalganj Upazilas
        $Gopalganj_array = [
            'Gopalganj Sadar',
            'Kashiani',
            'Kotalipara',
            'Muksudpur',
            'Tungipara',

        ];
        $Gopalganj_district = ShipDistricts::where('district_name', 'Gopalganj')->select('id', 'shipdivision_id')->first();
        foreach ($Gopalganj_array as $Gopalganj) {
            ShipStates::insert([
                'shipdivision_id' => $Gopalganj_district->shipdivision_id,
                'shipdistrict_id' => $Gopalganj_district->id,
                'state_name' => $Gopalganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Jamalpur Upazilas
        $Jamalpur_array = [
            'Bakshiganj',
            'Dewanganj',
            'Islampur',
            'Jamalpur Sadar',
            'Madarganj',
            'Melandaha',
            'Sarishabari',

        ];
        $Jamalpur_district = ShipDistricts::where('district_name', 'Jamalpur')->select('id', 'shipdivision_id')->first();
        foreach ($Jamalpur_array as $Jamalpur) {
            ShipStates::insert([
                'shipdivision_id' => $Jamalpur_district->shipdivision_id,
                'shipdistrict_id' => $Jamalpur_district->id,
                'state_name' => $Jamalpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Kishoreganj Upazilas
        $Kishoreganj_array = [
            'Astagram',
            'Bajitpur',
            'Bhairab',
            'Hossainpur',
            'Itna',
            'Karimganj',
            'Katiadi',
            'Kishoreganj Sadar',
            'Kuliarchar',
            'Mithamain',
            'Nikli',
            'Pakundia',
            'Tarail',

        ];
        $Kishoreganj_district = ShipDistricts::where('district_name', 'Kishoreganj')->select('id', 'shipdivision_id')->first();
        foreach ($Kishoreganj_array as $Kishoreganj) {
            ShipStates::insert([
                'shipdivision_id' => $Kishoreganj_district->shipdivision_id,
                'shipdistrict_id' => $Kishoreganj_district->id,
                'state_name' => $Kishoreganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Madaripur Upazilas
        $Madaripur_array = [
            'Kalkini',
            'Madaripur Sadar',
            'Rajoir',
            'Shibchar',

        ];
        $Madaripur_district = ShipDistricts::where('district_name', 'Madaripur')->select('id', 'shipdivision_id')->first();
        foreach ($Madaripur_array as $Madaripur) {
            ShipStates::insert([
                'shipdivision_id' => $Madaripur_district->shipdivision_id,
                'shipdistrict_id' => $Madaripur_district->id,
                'state_name' => $Madaripur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Manikganj Upazilas
        $Manikganj_array = [
            'Daulatpur',
            'Ghior',
            'Harirampur',
            'Manikganj Sadar',
            'Saturia',
            'Shibalaya',

        ];
        $Manikganj_district = ShipDistricts::where('district_name', 'Manikganj')->select('id', 'shipdivision_id')->first();
        foreach ($Manikganj_array as $Manikganj) {
            ShipStates::insert([
                'shipdivision_id' => $Manikganj_district->shipdivision_id,
                'shipdistrict_id' => $Manikganj_district->id,
                'state_name' => $Manikganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Munshiganj Upazilas
        $Munshiganj_array = [
            'Gazaria',
            'Munshiganj Sadar',
            'Sreenagar',
            'Lohajang',
            'Sirajdikhan',
            'Tongibari',

        ];
        $Munshiganj_district = ShipDistricts::where('district_name', 'Munshiganj')->select('id', 'shipdivision_id')->first();
        foreach ($Munshiganj_array as $Munshiganj) {
            ShipStates::insert([
                'shipdivision_id' => $Munshiganj_district->shipdivision_id,
                'shipdistrict_id' => $Munshiganj_district->id,
                'state_name' => $Munshiganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Mymensingh Upazilas
        $Mymensingh_array = [
            'Bhaluka',
            'Dhobaura',
            'Fulbaria',
            'Gaffargaon',
            'Gauripur',
            'Haluaghat',
            'Ishwarganj',
            'Muktagacha',
            'Mymensingh Sadar',
            'Nandail',
            'Phulpur',
            'Trishal',

        ];
        $Mymensingh_district = ShipDistricts::where('district_name', 'Mymensingh')->select('id', 'shipdivision_id')->first();
        foreach ($Mymensingh_array as $Mymensingh) {
            ShipStates::insert([
                'shipdivision_id' => $Mymensingh_district->shipdivision_id,
                'shipdistrict_id' => $Mymensingh_district->id,
                'state_name' => $Mymensingh,
                'created_at' => Carbon::now(),
            ]);
        }

        // Narayanganj Upazilas
        $Narayanganj_array = [
            'Araihazar',
            'Bandar',
            'Narayanganj Sadar',
            'Rupganj',
            'Sonargaon',

        ];
        $Narayanganj_district = ShipDistricts::where('district_name', 'Narayanganj')->select('id', 'shipdivision_id')->first();
        foreach ($Narayanganj_array as $Narayanganj) {
            ShipStates::insert([
                'shipdivision_id' => $Narayanganj_district->shipdivision_id,
                'shipdistrict_id' => $Narayanganj_district->id,
                'state_name' => $Narayanganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Narsingdi Upazilas
        $Narsingdi_array = [
            'Belabo',
            'Monohardi',
            'Narsingdi Sadar',
            'Palash',
            'Raipura',
            'Shibpur',

        ];
        $Narsingdi_district = ShipDistricts::where('district_name', 'Narsingdi')->select('id', 'shipdivision_id')->first();
        foreach ($Narsingdi_array as $Narsingdi) {
            ShipStates::insert([
                'shipdivision_id' => $Narsingdi_district->shipdivision_id,
                'shipdistrict_id' => $Narsingdi_district->id,
                'state_name' => $Narsingdi,
                'created_at' => Carbon::now(),
            ]);
        }

        // Netrokona Upazilas
        $Netrokona_array = [
            'Atpara',
            'Barhatta',
            'Durgapur',
            'Kalmakanda',
            'Kendua',
            'Khaliajuri',
            'Madan',
            'Mohanganj',
            'Netrokona Sadar',
            'Purbadhala',

        ];
        $Netrokona_district = ShipDistricts::where('district_name', 'Netrokona')->select('id', 'shipdivision_id')->first();
        foreach ($Netrokona_array as $Netrokona) {
            ShipStates::insert([
                'shipdivision_id' => $Netrokona_district->shipdivision_id,
                'shipdistrict_id' => $Netrokona_district->id,
                'state_name' => $Netrokona,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rajbari Upazilas
        $Rajbari_array = [
            'Baliakandi',
            'Goalandaghat',
            'Kalukhali',
            'Pangsha',
            'Rajbari Sadar',

        ];
        $Rajbari_district = ShipDistricts::where('district_name', 'Rajbari')->select('id', 'shipdivision_id')->first();
        foreach ($Rajbari_array as $Rajbari) {
            ShipStates::insert([
                'shipdivision_id' => $Rajbari_district->shipdivision_id,
                'shipdistrict_id' => $Rajbari_district->id,
                'state_name' => $Rajbari,
                'created_at' => Carbon::now(),
            ]);
        }

        // Shariatpur Upazilas
        $Shariatpur_array = [
            'Bhedarganj',
            'Damudya',
            'Gosairhat',
            'Naria',
            'Shariatpur Sadar',
            'Zanjira',

        ];
        $Shariatpur_district = ShipDistricts::where('district_name', 'Shariatpur')->select('id', 'shipdivision_id')->first();
        foreach ($Shariatpur_array as $Shariatpur) {
            ShipStates::insert([
                'shipdivision_id' => $Shariatpur_district->shipdivision_id,
                'shipdistrict_id' => $Shariatpur_district->id,
                'state_name' => $Shariatpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sherpur Upazilas
        $Sherpur_array = [
            'Jhenaigati',
            'Nakla',
            'Nalitabari',
            'Sherpur Sadar',
            'Sreebardi',

        ];
        $Sherpur_district = ShipDistricts::where('district_name', 'Sherpur')->select('id', 'shipdivision_id')->first();
        foreach ($Sherpur_array as $Sherpur) {
            ShipStates::insert([
                'shipdivision_id' => $Sherpur_district->shipdivision_id,
                'shipdistrict_id' => $Sherpur_district->id,
                'state_name' => $Sherpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Tangail Upazilas
        $Tangail_array = [
            'Bhuapur',
            'Delduar',
            'Ghatail',
            'Gopalpur',
            'Kalihati',
            'Madhupur',
            'Mirzapur',
            'Nagarpur',
            'Sakhipur',
            'Tangail Sadar',

        ];
        $Tangail_district = ShipDistricts::where('district_name', 'Tangail')->select('id', 'shipdivision_id')->first();
        foreach ($Tangail_array as $Tangail) {
            ShipStates::insert([
                'shipdivision_id' => $Tangail_district->shipdivision_id,
                'shipdistrict_id' => $Tangail_district->id,
                'state_name' => $Tangail,
                'created_at' => Carbon::now(),
            ]);
        }

        // Bagerhat Upazilas
        $Bagerhat_array = [
            'Bagerhat Sadar',
            'Chitalmari',
            'Fakirhat',
            'Kachua',
            'Mollahat',
            'Mongla',
            'Morrelganj',
            'Rampal',
            'Sarankhola',

        ];
        $Bagerhat_district = ShipDistricts::where('district_name', 'Bagerhat')->select('id', 'shipdivision_id')->first();
        foreach ($Bagerhat_array as $Bagerhat) {
            ShipStates::insert([
                'shipdivision_id' => $Bagerhat_district->shipdivision_id,
                'shipdistrict_id' => $Bagerhat_district->id,
                'state_name' => $Bagerhat,
                'created_at' => Carbon::now(),
            ]);
        }

        // Chuadanga Upazilas
        $Chuadanga_array = [
            'Alamdanga',
            'Chuadanga Sadar',
            'Damurhuda',
            'Jibannagar',

        ];
        $Chuadanga_district = ShipDistricts::where('district_name', 'Chuadanga')->select('id', 'shipdivision_id')->first();
        foreach ($Chuadanga_array as $Chuadanga) {
            ShipStates::insert([
                'shipdivision_id' => $Chuadanga_district->shipdivision_id,
                'shipdistrict_id' => $Chuadanga_district->id,
                'state_name' => $Chuadanga,
                'created_at' => Carbon::now(),
            ]);
        }

        // Jessore Upazilas
        $Jessore_array = [
            'Abhaynagar',
            'Bagherpara',
            'Chaugachha',
            'Jessore Sadar',
            'Jhikargachha',
            'Keshabpur',
            'Manirampur',
            'Sharsha',

        ];
        $Jessore_district = ShipDistricts::where('district_name', 'Jessore')->select('id', 'shipdivision_id')->first();
        foreach ($Jessore_array as $Jessore) {
            ShipStates::insert([
                'shipdivision_id' => $Jessore_district->shipdivision_id,
                'shipdistrict_id' => $Jessore_district->id,
                'state_name' => $Jessore,
                'created_at' => Carbon::now(),
            ]);
        }

        // Jhenaidah Upazilas
        $Jhenaidah_array = [
            'Harinakunda',
            'Jhenaidah Sadar',
            'Kaliganj',
            'Kotchandpur',
            'Maheshpur',
            'Shailkupa',

        ];
        $Jhenaidah_district = ShipDistricts::where('district_name', 'Jhenaidah')->select('id', 'shipdivision_id')->first();
        foreach ($Jhenaidah_array as $Jhenaidah) {
            ShipStates::insert([
                'shipdivision_id' => $Jhenaidah_district->shipdivision_id,
                'shipdistrict_id' => $Jhenaidah_district->id,
                'state_name' => $Jhenaidah,
                'created_at' => Carbon::now(),
            ]);
        }

        // Khulna Upazilas
        $Khulna_array = [
            'Batiaghata',
            'Dacope',
            'Dumuria',
            'Dighalia',
            'Koyra',
            'Paikgachha',
            'Phultala',
            'Rupsa',
            'Terokhada',
            'Khulna Sadar',

        ];
        $Khulna_district = ShipDistricts::where('district_name', 'Khulna')->select('id', 'shipdivision_id')->first();
        foreach ($Khulna_array as $Khulna) {
            ShipStates::insert([
                'shipdivision_id' => $Khulna_district->shipdivision_id,
                'shipdistrict_id' => $Khulna_district->id,
                'state_name' => $Khulna,
                'created_at' => Carbon::now(),
            ]);
        }

        // Kushtia Upazilas
        $Kushtia_array = [
            'Bheramara',
            'Daulatpur',
            'Khoksa',
            'Kumarkhali',
            'Kushtia Sadar',
            'Mirpur',

        ];
        $Kushtia_district = ShipDistricts::where('district_name', 'Kushtia')->select('id', 'shipdivision_id')->first();
        foreach ($Kushtia_array as $Kushtia) {
            ShipStates::insert([
                'shipdivision_id' => $Kushtia_district->shipdivision_id,
                'shipdistrict_id' => $Kushtia_district->id,
                'state_name' => $Kushtia,
                'created_at' => Carbon::now(),
            ]);
        }

        // Magura Upazilas
        $Magura_array = [
            'Magura Sadar',
            'Mohammadpur',
            'Shalikha',
            'Sreepur',

        ];
        $Magura_district = ShipDistricts::where('district_name', 'Magura')->select('id', 'shipdivision_id')->first();
        foreach ($Magura_array as $Magura) {
            ShipStates::insert([
                'shipdivision_id' => $Magura_district->shipdivision_id,
                'shipdistrict_id' => $Magura_district->id,
                'state_name' => $Magura,
                'created_at' => Carbon::now(),
            ]);
        }

        // Meherpur Upazilas
        $Meherpur_array = [
            'Gangni',
            'Meherpur Sadar',
            'Mujibnagar',

        ];
        $Meherpur_district = ShipDistricts::where('district_name', 'Meherpur')->select('id', 'shipdivision_id')->first();
        foreach ($Meherpur_array as $Meherpur) {
            ShipStates::insert([
                'shipdivision_id' => $Meherpur_district->shipdivision_id,
                'shipdistrict_id' => $Meherpur_district->id,
                'state_name' => $Meherpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Narail Upazilas
        $Narail_array = [
            'Kalia',
            'Lohagara',
            'Narail Sadar',

        ];
        $Narail_district = ShipDistricts::where('district_name', 'Narail')->select('id', 'shipdivision_id')->first();
        foreach ($Narail_array as $Narail) {
            ShipStates::insert([
                'shipdivision_id' => $Narail_district->shipdivision_id,
                'shipdistrict_id' => $Narail_district->id,
                'state_name' => $Narail,
                'created_at' => Carbon::now(),
            ]);
        }

        // Satkhira Upazilas
        $Satkhira_array = [
            'Assasuni',
            'Debhata',
            'Kalaroa',
            'Kaliganj',
            'Satkhira Sadar',
            'Shyamnagar',
            'Tala',

        ];
        $Satkhira_district = ShipDistricts::where('district_name', 'Satkhira')->select('id', 'shipdivision_id')->first();
        foreach ($Satkhira_array as $Satkhira) {
            ShipStates::insert([
                'shipdivision_id' => $Satkhira_district->shipdivision_id,
                'shipdistrict_id' => $Satkhira_district->id,
                'state_name' => $Satkhira,
                'created_at' => Carbon::now(),
            ]);
        }

        // Jamalpur Upazilas
        $Jamalpur_array = [
            'Bakshiganj',
            'Dewanganj',
            'Islampur',
            'Jamalpur Sadar',
            'Madarganj',
            'Melandaha',
            'Sarishabari',

        ];
        $Jamalpur_district = ShipDistricts::where('district_name', 'Jamalpur')->select('id', 'shipdivision_id')->first();
        foreach ($Jamalpur_array as $Jamalpur) {
            ShipStates::insert([
                'shipdivision_id' => $Jamalpur_district->shipdivision_id,
                'shipdistrict_id' => $Jamalpur_district->id,
                'state_name' => $Jamalpur,
                'created_at' => Carbon::now(),
            ]);
        }
        // Mymensingh Upazilas
        $Mymensingh_array = [
            'Bhaluka',
            'Dhobaura',
            'Fulbaria',
            'Gaffargaon',
            'Gauripur',
            'Haluaghat',
            'Ishwarganj',
            'Muktagacha',
            'Mymensingh Sadar',
            'Nandail',
            'Phulpur',
            'Trishal',

        ];
        $Mymensingh_district = ShipDistricts::where('district_name', 'Mymensingh')->select('id', 'shipdivision_id')->first();
        foreach ($Mymensingh_array as $Mymensingh) {
            ShipStates::insert([
                'shipdivision_id' => $Mymensingh_district->shipdivision_id,
                'shipdistrict_id' => $Mymensingh_district->id,
                'state_name' => $Mymensingh,
                'created_at' => Carbon::now(),
            ]);
        }

        // Netrokona Upazilas
        $Netrokona_array = [
            'Atpara',
            'Barhatta',
            'Durgapur',
            'Khaliajuri',
            'Kalmakanda',
            'Kendua',
            'Madan',
            'Mohanganj',
            'Netrokona Sadar',
            'Purbadhala',

        ];
        $Netrokona_district = ShipDistricts::where('district_name', 'Netrokona')->select('id', 'shipdivision_id')->first();
        foreach ($Netrokona_array as $Netrokona) {
            ShipStates::insert([
                'shipdivision_id' => $Netrokona_district->shipdivision_id,
                'shipdistrict_id' => $Netrokona_district->id,
                'state_name' => $Netrokona,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sherpur Upazilas
        $Sherpur_array = [
            'Jhenaigati',
            'Nakla',
            'Nalitabari',
            'Sherpur Sadar',
            'Sreebardi',

        ];
        $Sherpur_district = ShipDistricts::where('district_name', 'Sherpur')->select('id', 'shipdivision_id')->first();
        foreach ($Sherpur_array as $Sherpur) {
            ShipStates::insert([
                'shipdivision_id' => $Sherpur_district->shipdivision_id,
                'shipdistrict_id' => $Sherpur_district->id,
                'state_name' => $Sherpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Bogra Upazilas
        $Bogra_array = [
            'Adamdighi',
            'Bogra Sadar',
            'Dhunat',
            'Dhupchanchia',
            'Gabtali',
            'Kahaloo',
            'Nandigram',
            'Sahajanpur',
            'Sariakandi',
            'Sherpur',
            'Shibganj',
            'Sonatala',

        ];
        $Bogra_district = ShipDistricts::where('district_name', 'Bogra')->select('id', 'shipdivision_id')->first();
        foreach ($Bogra_array as $Bogra) {
            ShipStates::insert([
                'shipdivision_id' => $Bogra_district->shipdivision_id,
                'shipdistrict_id' => $Bogra_district->id,
                'state_name' => $Bogra,
                'created_at' => Carbon::now(),
            ]);
        }

        // Chapainawabganj Upazilas
        $Chapainawabganj_array = [
            'Adamdighi',
            'Bogra Sadar',
            'Dhunat',
            'Dhupchanchia',
            'Gabtali',
            'Kahaloo',
            'Nandigram',
            'Sahajanpur',
            'Sariakandi',
            'Sherpur',
            'Shibganj',
            'Sonatala',

        ];
        $Chapainawabganj_district = ShipDistricts::where('district_name', 'Chapainawabganj')->select('id', 'shipdivision_id')->first();
        foreach ($Chapainawabganj_array as $Chapainawabganj) {
            ShipStates::insert([
                'shipdivision_id' => $Chapainawabganj_district->shipdivision_id,
                'shipdistrict_id' => $Chapainawabganj_district->id,
                'state_name' => $Chapainawabganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Joypurhat Upazilas
        $Joypurhat_array = [
            'Akkelpur',
            'Joypurhat Sadar',
            'Kalai',
            'Khetlal',
            'Panchbibi',

        ];
        $Joypurhat_district = ShipDistricts::where('district_name', 'Joypurhat')->select('id', 'shipdivision_id')->first();
        foreach ($Joypurhat_array as $Joypurhat) {
            ShipStates::insert([
                'shipdivision_id' => $Joypurhat_district->shipdivision_id,
                'shipdistrict_id' => $Joypurhat_district->id,
                'state_name' => $Joypurhat,
                'created_at' => Carbon::now(),
            ]);
        }

        // Naogaon Upazilas
        $Naogaon_array = [
            'Atrai',
            'Badalgachhi',
            'Dhamoirhat',
            'Manda',
            'Mahadebpur',
            'Naogaon Sadar',
            'Niamatpur',
            'Patnitala',
            'Porsha',
            'Raninagar',
            'Sapahar',

        ];
        $Naogaon_district = ShipDistricts::where('district_name', 'Naogaon')->select('id', 'shipdivision_id')->first();
        foreach ($Naogaon_array as $Naogaon) {
            ShipStates::insert([
                'shipdivision_id' => $Naogaon_district->shipdivision_id,
                'shipdistrict_id' => $Naogaon_district->id,
                'state_name' => $Naogaon,
                'created_at' => Carbon::now(),
            ]);
        }

        // Natore Upazilas
        $Natore_array = [
            'Bagatipara',
            'Baraigram',
            'Gurudaspur',
            'Lalpur',
            'Natore Sadar',
            'Singra',

        ];
        $Natore_district = ShipDistricts::where('district_name', 'Natore')->select('id', 'shipdivision_id')->first();
        foreach ($Natore_array as $Natore) {
            ShipStates::insert([
                'shipdivision_id' => $Natore_district->shipdivision_id,
                'shipdistrict_id' => $Natore_district->id,
                'state_name' => $Natore,
                'created_at' => Carbon::now(),
            ]);
        }

        // Pabna Upazilas
        $Pabna_array = [
            'Atgharia',
            'Bera',
            'Bhangura',
            'Chatmohar',
            'Faridpur',
            'Ishwardi',
            'Pabna Sadar',
            'Santhia',
            'Sujanagar',

        ];
        $Pabna_district = ShipDistricts::where('district_name', 'Pabna')->select('id', 'shipdivision_id')->first();
        foreach ($Pabna_array as $Pabna) {
            ShipStates::insert([
                'shipdivision_id' => $Pabna_district->shipdivision_id,
                'shipdistrict_id' => $Pabna_district->id,
                'state_name' => $Pabna,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rajshahi Upazilas
        $Rajshahi_array = [
            'Bagha',
            'Bagmara',
            'Charghat',
            'Durgapur',
            'Godagari',
            'Mohanpur',
            'Paba',
            'Puthia',
            'Rajshahi Sadar',
            'Tanore',

        ];
        $Rajshahi_district = ShipDistricts::where('district_name', 'Rajshahi')->select('id', 'shipdivision_id')->first();
        foreach ($Rajshahi_array as $Rajshahi) {
            ShipStates::insert([
                'shipdivision_id' => $Rajshahi_district->shipdivision_id,
                'shipdistrict_id' => $Rajshahi_district->id,
                'state_name' => $Rajshahi,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sirajganj Upazilas
        $Sirajganj_array = [
            'Belkuchi',
            'Chauhali',
            'Kamarkhanda',
            'Kazipur',
            'Raiganj',
            'Shahjadpur',
            'Sirajganj Sadar',
            'Tarash',
            'Ullahpara',

        ];
        $Sirajganj_district = ShipDistricts::where('district_name', 'Sirajganj')->select('id', 'shipdivision_id')->first();
        foreach ($Sirajganj_array as $Sirajganj) {
            ShipStates::insert([
                'shipdivision_id' => $Sirajganj_district->shipdivision_id,
                'shipdistrict_id' => $Sirajganj_district->id,
                'state_name' => $Sirajganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Dinajpur Upazilas
        $Dinajpur_array = [
            'Birampur',
            'Birganj',
            'Bochaganj',
            'Chirirbandar',
            'Phulbari',
            'Ghoraghat',
            'Hakimpur',
            'Kaharole',
            'Khansama',
            'Dinajpur Sadar',
            'Nawabganj',
            'Parbatipur',

        ];
        $Dinajpur_district = ShipDistricts::where('district_name', 'Dinajpur')->select('id', 'shipdivision_id')->first();
        foreach ($Dinajpur_array as $Dinajpur) {
            ShipStates::insert([
                'shipdivision_id' => $Dinajpur_district->shipdivision_id,
                'shipdistrict_id' => $Dinajpur_district->id,
                'state_name' => $Dinajpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Gaibandha Upazilas
        $Gaibandha_array = [
            'Sadullapur',
            'Sundarganj',
            'Gobindaganj',
            'Palashbari',
            'Gaibandha Sadar',
            'Phulchhari',
            'Saghata',
            'Fulbari',

        ];
        $Gaibandha_district = ShipDistricts::where('district_name', 'Gaibandha')->select('id', 'shipdivision_id')->first();
        foreach ($Gaibandha_array as $Gaibandha) {
            ShipStates::insert([
                'shipdivision_id' => $Gaibandha_district->shipdivision_id,
                'shipdistrict_id' => $Gaibandha_district->id,
                'state_name' => $Gaibandha,
                'created_at' => Carbon::now(),
            ]);
        }

        // Kurigram Upazilas
        $Kurigram_array = [
            'Kurigram Sadar',
            'Nageshwari',
            'Bhurungamari',
            'Phulbari',
            'Rajarhat',
            'Ulipur',
            'Chilmari',
            'Rowmari',

        ];
        $Kurigram_district = ShipDistricts::where('district_name', 'Kurigram')->select('id', 'shipdivision_id')->first();
        foreach ($Kurigram_array as $Kurigram) {
            ShipStates::insert([
                'shipdivision_id' => $Kurigram_district->shipdivision_id,
                'shipdistrict_id' => $Kurigram_district->id,
                'state_name' => $Kurigram,
                'created_at' => Carbon::now(),
            ]);
        }

        // Lalmonirhat Upazilas
        $Lalmonirhat_array = [
            'Lalmonirhat Sadar',
            'Aditmari',
            'Kaliganj',
            'Hatibandha',
            'Patgram',

        ];
        $Lalmonirhat_district = ShipDistricts::where('district_name', 'Lalmonirhat')->select('id', 'shipdivision_id')->first();
        foreach ($Lalmonirhat_array as $Lalmonirhat) {
            ShipStates::insert([
                'shipdivision_id' => $Lalmonirhat_district->shipdivision_id,
                'shipdistrict_id' => $Lalmonirhat_district->id,
                'state_name' => $Lalmonirhat,
                'created_at' => Carbon::now(),
            ]);
        }

        // Nilphamari Upazilas
        $Nilphamari_array = [
            'Nilphamari Sadar',
            'Dimla',
            'Jaldhaka',
            'Kishoreganj',
            'Saidpur',
            'Domar',
            'Sadar',

        ];
        $Nilphamari_district = ShipDistricts::where('district_name', 'Nilphamari')->select('id', 'shipdivision_id')->first();
        foreach ($Nilphamari_array as $Nilphamari) {
            ShipStates::insert([
                'shipdivision_id' => $Nilphamari_district->shipdivision_id,
                'shipdistrict_id' => $Nilphamari_district->id,
                'state_name' => $Nilphamari,
                'created_at' => Carbon::now(),
            ]);
        }

        // Panchagarh Upazilas
        $Panchagarh_array = [
            'Panchagarh Sadar',
            'Boda',
            'Debiganj',
            'Atwari',
            'Tetulia',

        ];
        $Panchagarh_district = ShipDistricts::where('district_name', 'Panchagarh')->select('id', 'shipdivision_id')->first();
        foreach ($Panchagarh_array as $Panchagarh) {
            ShipStates::insert([
                'shipdivision_id' => $Panchagarh_district->shipdivision_id,
                'shipdistrict_id' => $Panchagarh_district->id,
                'state_name' => $Panchagarh,
                'created_at' => Carbon::now(),
            ]);
        }

        // Rangpur Upazilas
        $Rangpur_array = [
            'Rangpur Sadar',
            'Badarganj',
            'Mithapukur',
            'Gangachara',
            'Taraganj',
            'Pirgachha',
            'Kaunia',
            'Pirganj',

        ];
        $Rangpur_district = ShipDistricts::where('district_name', 'Rangpur')->select('id', 'shipdivision_id')->first();
        foreach ($Rangpur_array as $Rangpur) {
            ShipStates::insert([
                'shipdivision_id' => $Rangpur_district->shipdivision_id,
                'shipdistrict_id' => $Rangpur_district->id,
                'state_name' => $Rangpur,
                'created_at' => Carbon::now(),
            ]);
        }

        // Thakurgaon Upazilas
        $Thakurgaon_array = [
            'Thakurgaon Sadar',
            'Baliadangi',
            'Haripur',
            'Ranisankail',

        ];
        $Thakurgaon_district = ShipDistricts::where('district_name', 'Thakurgaon')->select('id', 'shipdivision_id')->first();
        foreach ($Thakurgaon_array as $Thakurgaon) {
            ShipStates::insert([
                'shipdivision_id' => $Thakurgaon_district->shipdivision_id,
                'shipdistrict_id' => $Thakurgaon_district->id,
                'state_name' => $Thakurgaon,
                'created_at' => Carbon::now(),
            ]);
        }

        // Habiganj Upazilas
        $Habiganj_array = [
            'Habiganj Sadar',
            'Ajmiriganj',
            'Baniachong',
            'Bahubal',
            'Chunarughat',
            'Lakhai',
            'Madhabpur',
            'Nabiganj',

        ];
        $Habiganj_district = ShipDistricts::where('district_name', 'Habiganj')->select('id', 'shipdivision_id')->first();
        foreach ($Habiganj_array as $Habiganj) {
            ShipStates::insert([
                'shipdivision_id' => $Habiganj_district->shipdivision_id,
                'shipdistrict_id' => $Habiganj_district->id,
                'state_name' => $Habiganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Moulvibazar Upazilas
        $Moulvibazar_array = [
            'Moulvibazar Sadar',
            'Kamalganj',
            'Kulaura',
            'Rajnagar',
            'Sreemangal',
            'Barlekha',
            'Juri',

        ];
        $Moulvibazar_district = ShipDistricts::where('district_name', 'Moulvibazar')->select('id', 'shipdivision_id')->first();
        foreach ($Moulvibazar_array as $Moulvibazar) {
            ShipStates::insert([
                'shipdivision_id' => $Moulvibazar_district->shipdivision_id,
                'shipdistrict_id' => $Moulvibazar_district->id,
                'state_name' => $Moulvibazar,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sunamganj Upazilas
        $Sunamganj_array = [
            'Sunamganj Sadar',
            'Chhatak',
            'Derai',
            'Dharampasha',
            'Dowarabazar',
            'Jagannathpur',
            'Jamalganj',
            'Sulla',
            'Tahirpur',

        ];
        $Sunamganj_district = ShipDistricts::where('district_name', 'Sunamganj')->select('id', 'shipdivision_id')->first();
        foreach ($Sunamganj_array as $Sunamganj) {
            ShipStates::insert([
                'shipdivision_id' => $Sunamganj_district->shipdivision_id,
                'shipdistrict_id' => $Sunamganj_district->id,
                'state_name' => $Sunamganj,
                'created_at' => Carbon::now(),
            ]);
        }

        // Sylhet Upazilas
        $Sylhet_array = [
            'Sylhet Sadar',
            'Beanibazar',
            'Bishwanath',
            'Companiganj',
            'Dakshin Surma',
            'Fenchuganj',
            'Golapganj',
            'Gowainghat',
            'Jaintiapur',
            'Kanaighat',
            'Zakiganj',

        ];
        $Sylhet_district = ShipDistricts::where('district_name', 'Sylhet')->select('id', 'shipdivision_id')->first();
        foreach ($Sylhet_array as $Sylhet) {
            ShipStates::insert([
                'shipdivision_id' => $Sylhet_district->shipdivision_id,
                'shipdistrict_id' => $Sylhet_district->id,
                'state_name' => $Sylhet,
                'created_at' => Carbon::now(),
            ]);
        }

    }
}
