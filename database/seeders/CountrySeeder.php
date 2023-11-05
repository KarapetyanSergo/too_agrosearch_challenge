<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::insert([
            [
                'name' => 'Germany',
                'tax_format' => 'DEXXXXXXXXX',
                'tax_percent' => 19
            ],
            [
                'name' => 'Italy',
                'tax_format' => 'ITXXXXXXXXXXX',
                'tax_percent' => 22
            ],
            [
                'name' => 'Greece',
                'tax_format' => 'GRXXXXXXXXX',
                'tax_percent' => 24
            ],
        ]);
    }
}
