<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Product;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_CheckIfBrandHasProductRelationship()
    {
        $this->seed(DatabaseSeeder::class);

        $brands = Brand::first();
        $products = Product::where('Brand_id', $brands->id);

        $this->assertInstanceOf(Product::class, $brands->Products->first());
    }
}