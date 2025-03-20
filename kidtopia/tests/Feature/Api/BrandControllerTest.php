<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Database\Seeders\BrandSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BrandControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use refreshDatabase;

    public function test_checkIfCanGetAllBrands(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->getJson(route('apiBrandsIndex'));

        $response->assertStatus(200);
    }

    public function test_checkIfCanGetOneBrand(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->getJson(route('apiBrandsShow', 1));
    
        $data = ['id' => 1];
    
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_checkIfTryToGetAnBrandThatDoesntExist(): void
    {
        $this->seed(BrandSeeder::class);
        
        $response = $this->getJson(route('apiBrandsShow', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Brand not found']);
    }

    public function test_checkIfCanCreateOneBrand(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->postJson(route('apiBrandsStore'),  [
            'name' => 'test'
        ]);

        $data = [
            'name' => 'test'
        ];

        $response->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function test_checkIfCanUpdateOneBrand(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->putJson(route('apiBrandsUpdate', 1),  [
            'name' => 'test'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'test']);
    }

    public function test_checkIfCanUpdateAnBrandThatDoesntExist(): void
    {
        $this->seed(BrandSeeder::class);

        $data = ['name' => 'test'];

        $response = $this->putJson(route('apiBrandsUpdate', 9999), $data);

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Brand not found']);
    }

    public function test_checkIfCanDeleteOneBrand(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->deleteJson(route('apiBrandsDestroy', 1));

        $response->assertStatus(204);
    }

    public function test_checkIfTryToDeleteAnBrandThatDoesntExist(): void
    {
        $this->seed(BrandSeeder::class);

        $response = $this->deleteJson(route('apiBrandsDestroy', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'Brand not found']);
    }
}
