<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use refreshDatabase;

    public function test_checkIfCanGetAllProducts(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('apiProductsIndex'));

        $response->assertStatus(200);
    }

    public function test_checkIfCanGetOneProduct(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('apiProductsShow', 1));
    
        $data = ['id' => 1];
    
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_checkIfTryToGetAProductThatDoesntExist(): void
    {
        $this->seed(DatabaseSeeder::class);
        
        $response = $this->getJson(route('apiProductsShow', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Product not found']);
    }

    public function test_checkIfCanCreateOneProduct(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('apiProductsStore'),  [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 5,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $data = [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 5,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ];

        $response->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function test_checkIfCanUpdateOneProduct(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('apiProductsUpdate', 1),  [
            'name' => 'test'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'test']);
    }

    public function test_checkIfCanUpdateAProductThatDoesntExist(): void
    {
        $this->seed(DatabaseSeeder::class);

        $data = ['name' => 'test'];

        $response = $this->putJson(route('apiProductsUpdate', 9999), $data);

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Product not found']);
    }

    public function test_checkIfCanDeleteOneProduct(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->deleteJson(route('apiProductsDestroy', 1));

        $response->assertStatus(204);
    }

    public function test_checkIfTryToDeleteAProductThatDoesntExist(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->deleteJson(route('apiProductsDestroy', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Product not found']);
    }

    public function test_CheckIfDontFindCategoryWhenCreateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('apiProductsStore'),  [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 99,
            'brand_id' => 5,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product category id does not exists'
            ]);
    }

    public function test_CheckIfDontFindBrandWhenCreateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('apiProductsStore'),  [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 99,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product brand id does not exists'
            ]);
    }

    public function test_CheckIfDontFindAgeRangeWhenCreateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->postJson(route('apiProductsStore'),  [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 5,
            'age_range_id' => 99,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product age range id does not exists'
            ]);
    }

    public function test_CheckIfDontFindProductIdWhenUpdateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('apiProductsUpdate', 9999), [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 5,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'Product not found'
            ]);
    }

    public function test_CheckIfDontFindCategoryIdWhenUpdateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('apiProductsUpdate', 1), [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 99,
            'brand_id' => 5,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product category id does not exists'
            ]);
    }

    public function test_CheckIfDontFindBrandIdWhenUpdateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('apiProductsUpdate', 1), [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 99,
            'age_range_id' => 5,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product brand id does not exists'
            ]);
    }

    public function test_CheckIfDontFindAgeRangeIdWhenUpdateAProduct()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->putJson(route('apiProductsUpdate', 1), [
            'name' => 'test',
            'description' => '100 piezas magnéticas para crear estructuras 3D',
            'price' => 49.99,
            'stock' => 150,
            'category_id' => 1,
            'brand_id' => 5,
            'age_range_id' => 99,
            'image' => 'https://live.staticflickr.com/65535/54393768517_16055517e5_m.jpg',
        ]);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'The product age range id does not exists'
            ]);
    }
}
