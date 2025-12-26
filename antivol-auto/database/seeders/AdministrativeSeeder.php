<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Commune;
use App\Models\Quarter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdministrativeSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = database_path('seeders/data/commune et qautier.xlsx');

        if (!file_exists($filePath)) {
            $this->command->warn("File not found: {$filePath}. Skipping import.");
            return;
        }

        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Assume header is first row, find indexes
            $header = array_map('trim', array_map('strtolower', $rows[0]));
            $communeIdx = array_search('commune', $header);
            $quarterIdx = array_search('quartier', $header);

            if ($communeIdx === false || $quarterIdx === false) {
                $this->command->error("Columns 'COMMUNE' and 'QUARTIER' not found in Excel.");
                return;
            }

            // Default City: Kinshasa
            $kinshasa = City::firstOrCreate(
                ['slug' => 'kinshasa'],
                ['name' => 'Kinshasa', 'country_code' => 'CD']
            );

            $count = 0;
            // Start from row 1 (skip header)
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];
                $communeName = trim($row[$communeIdx] ?? '');
                $quarterName = trim($row[$quarterIdx] ?? '');

                if (empty($communeName)) continue;

                // Create/Find Commune
                $communeSlug = Str::slug($communeName);
                $commune = Commune::firstOrCreate(
                    ['city_id' => $kinshasa->id, 'slug' => $communeSlug],
                    ['name' => ucwords(strtolower($communeName))]
                );

                if (!empty($quarterName)) {
                    // Create/Find Quarter
                    $quarterSlug = Str::slug($quarterName);
                    Quarter::firstOrCreate(
                        ['commune_id' => $commune->id, 'slug' => $quarterSlug],
                        ['name' => ucwords(strtolower($quarterName))]
                    );
                }
                $count++;
            }

            $this->command->info("Imported {$count} rows for Kinshasa.");

        } catch (\Exception $e) {
            $this->command->error("Error importing Excel: " . $e->getMessage());
        }
    }
}
