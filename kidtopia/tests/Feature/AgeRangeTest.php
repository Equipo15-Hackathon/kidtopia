<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\AgeRange;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AgeRangeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_CheckIfAgeRangeHasProductRelationship()
    {
        $this->seed(DatabaseSeeder::class);

        $ageRanges = AgeRange::first();
        $products = Product::where('AgeRange_id', $ageRanges->id);

        $this->assertInstanceOf(Product::class, $ageRanges->Products->first());
    }
}