<?php

namespace Database\Seeders;

use App\Models\AgeRange;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ageRanges = [
            '0-1',
            '2-5',
            '3-8',
            '4-9',
            '6-12',
            '14-99'
        ];

        foreach ($ageRanges as $range) {
            AgeRange::create(['range' => $range]);
        }
    }
}
