<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $response = Http::withHeaders([
        	'key' => '3c56eda66557b6e0d986f24ab7948756'
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response['rajaongkir']['results'];

        foreach ($provinces as $province) {
        	$data_province[] = [
        		'id' => $province['province_id'],
        		'province' => $province['province']
        	];
        }

        Province::insert($data_province);
    }
}
