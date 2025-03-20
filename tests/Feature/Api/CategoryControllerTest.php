<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use refreshDatabase;

    public function test_checkIfCanGetAllCategories(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->getJson(route('apiCategoriesIndex'));

        $response->assertStatus(200);
    }

    public function test_checkIfCanGetOneAgeRange(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->getJson(route('apiCategoriesShow', 1));
    
        $data = ['id' => 1];
    
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_checkIfTryToGetAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(CategorySeeder::class);
        
        $response = $this->getJson(route('apiCategoriesShow', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Category not found']);
    }

    public function test_checkIfCanCreateOneAgeRange(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->postJson(route('apiCategoriesStore'),  [
            'name' => 'test'
        ]);

        $data = [
            'name' => 'test'
        ];

        $response->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function test_checkIfCanUpdateOneAgeRange(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->putJson(route('apiCategoriesUpdate', 1),  [
            'name' => 'test'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'test']);
    }

    public function test_checkIfCanUpdateAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(CategorySeeder::class);

        $data = ['name' => 'test'];

        $response = $this->putJson(route('apiCategoriesUpdate', 9999), $data);

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Category not found']);
    }

    public function test_checkIfCanDeleteOneAgeRange(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->deleteJson(route('apiCategoriesDestroy', 1));

        $response->assertStatus(204);
    }

    public function test_checkIfTryToDeleteAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->deleteJson(route('apiCategoriesDestroy', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Category not found']);
    }
}
