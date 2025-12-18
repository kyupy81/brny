<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleCatalogSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            'Toyota' => ['Corolla', 'Rav4', 'Hilux', 'Prado', 'Land Cruiser', 'Vitz', 'Ist', 'Noah'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'G-Class', 'GLK', 'Sprinter'],
            'Hyundai' => ['Tucson', 'Santa Fe', 'Elantra', 'Accent', 'H1'],
            'Nissan' => ['Patrol', 'X-Trail', 'Sunny', 'Civilian'],
            'Suzuki' => ['Grand Vitara', 'Jimny', 'Alto'],
            'Mitsubishi' => ['Pajero', 'L200', 'Canter'],
            'Ford' => ['Ranger', 'Everest', 'F-150'],
            'Honda' => ['CR-V', 'Civic', 'Accord'],
            'Kia' => ['Sportage', 'Sorento', 'Picanto'],
            'BMW' => ['X5', 'X3', 'Series 3', 'Series 5']
        ];

        foreach ($brands as $brandName => $models) {
            $brandId = DB::table('vehicle_brands')->insertGetId([
                'name' => $brandName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($models as $modelName) {
                DB::table('vehicle_models')->insert([
                    'brand_id' => $brandId,
                    'name' => $modelName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}