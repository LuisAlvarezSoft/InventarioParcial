<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /** @test */
    public function it_can_create_a_product()
    {
        $product = new Product([
            'name' => 'iPhone 15',
            'price' => 999.99,
            'stock' => 50,
            'stock' => 50,
            'category_id' => 1
        ]);

        $this->assertEquals('iPhone 15', $product->name);
        $this->assertEquals(999.99, $product->price);
        $this->assertEquals(50, $product->stock);
        $this->assertEquals(50, $product->stock);
        $this->assertEquals(1, $product->category_id);
    }

    /** @test */
    public function it_can_update_product_name()
    {
        $product = new Product([
            'name' => 'nombre viejo',
            'price' => 100.00,
            'stock' => 10
        ]);

        $product->name = 'nombre nuevo';

        $this->assertEquals('nombre nuevo', $product->name);
    }

    /** @test */
    public function it_has_category_relationship()
    {
        $product = new Product();
        $this->assertTrue(method_exists($product, 'category'));
    }

    /** @test */
    public function it_can_check_if_product_has_low_stock()
    {
        $product = new Product([
            'name' => 'test producto',
            'price' => 25.00,
            'stock' => 5,
            'stock' => 5
        ]);
        $this->assertTrue($product->stock < 10);
    }

}