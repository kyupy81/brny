<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            'Kinshasa', 'Lubumbashi', 'Mbuji-Mayi', 'Kisangani', 'Goma', 
            'Bukavu', 'Matadi', 'Kananga', 'Kolwezi', 'Likasi', 'Kikwit'
        ];

        foreach ($cities as $cityName) {
            City::firstOrCreate(
                ['slug' => Str::slug($cityName)],
                ['name' => $cityName, 'country_code' => 'CD']
            );
        }
    }
}
