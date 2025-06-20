<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductApiTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function it_can_check_health_endpoint()
    {
        // Act - Hacer petición al endpoint de salud
        $response = $this->getJson('/api/health');

        // Assert - Verificar respuesta
        $response->assertStatus(200)
                ->assertJson([
                    'status' => 'ok'
                ]);
    }

    /**
     * @test
     */
    public function it_can_get_all_products()
    {
        $category = Category::create([
            'name' => 'Test Category'
        ]);

        Product::create([
            'name' => 'Producto 1',
            'price' => 100.00,
            'stock' => 10,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Producto 2',
            'price' => 200.00,
            'stock' => 20,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Producto 3',
            'price' => 300.00,
            'stock' => 30,
            'category_id' => 1,
        ]);

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'price',
                    'stock',
                    'created_at',
                    'updated_at'
                ]
            ])
            ->assertJsonCount(3);
    }


    /**
     * @test
     */
    public function database_responds()
    {
        $category = Category::create([
            'name' => 'Test Category'
        ]);

        $product = Product::create([
            'name' => 'iPhone 15 Pro',
            'price' => 1000,
            'stock' => 25,
            'category_id' => $category->id,
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'iPhone 15 Pro',
            'price' => 1000,
            'stock' => 25,
            'category_id' => $category->id,
        ]);
    }

}