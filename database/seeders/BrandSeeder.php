<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'ToyJoy',
            'Melissa & Doug',
            'Fisher-Price',
            'National Geographic Kids',
            'MagnaTiles',
            'Little Tikes',
            'Hot Wheels',
            'Thames & Kosmos',
            'LEGO',
            'Manhattan Toy',
            'Crayola',
            'Radio Flyer'
        ];

        foreach ($brands as $brand) {
            Brand::create(['name' => $brand]);
        }
    }
}
