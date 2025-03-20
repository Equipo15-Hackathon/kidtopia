<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\AgeRange;
use Database\Seeders\AgeRangeSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AgeRangeControllerTest extends TestCase
{
/**
     * A basic feature test example.
     */
    use refreshDatabase;

    public function test_checkIfCanGetAllAgeRanges(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->getJson(route('apiAgeRangesIndex'));

        $response->assertStatus(200);
    }

    public function test_checkIfCanGetOneAgeRange(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->getJson(route('apiAgeRangesShow', 1));
    
        $data = ['id' => 1];
    
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_checkIfTryToGetAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(AgeRangeSeeder::class);
        
        $response = $this->getJson(route('apiAgeRangesShow', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'AgeRange not found']);
    }

    public function test_checkIfCanCreateOneAgeRange(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->postJson(route('apiAgeRangesStore'),  [
            'range' => '18-99'
        ]);

        $data = [
            'range' => '18-99'
        ];

        $response->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function test_checkIfCanUpdateOneAgeRange(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->putJson(route('apiAgeRangesUpdate', 1),  [
            'range' => '7-14'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['range' => '7-14']);
    }

    public function test_checkIfCanUpdateAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $data = ['range' => '7-14'];

        $response = $this->putJson(route('apiAgeRangesUpdate', 9999), $data);

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'AgeRange not found']);
    }

    public function test_checkIfCanDeleteOneAgeRange(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->deleteJson(route('apiAgeRangesDestroy', 1));

        $response->assertStatus(204);
    }

    public function test_checkIfTryToDeleteAnAgeRangeThatDoesntExist(): void
    {
        $this->seed(AgeRangeSeeder::class);

        $response = $this->deleteJson(route('apiAgeRangesDestroy', 9999));

        $response->assertStatus(404)
            ->assertJsonFragment(['message' => 'AgeRange not found']);
    }
}

