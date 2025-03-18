<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_CheckIfCategoryHasProductRelationship()
    {
        $this->seed(DatabaseSeeder::class);

        $categories = Category::first();
        $products = Product::where('Category_id', $categories->id);

        $this->assertInstanceOf(Product::class, $categories->Products->first());
    }
}