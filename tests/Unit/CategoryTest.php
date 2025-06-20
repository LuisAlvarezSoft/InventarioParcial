<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Category;



class CategoryTest extends TestCase
{
    /** @test */
    public function it_can_create_a_category()
    {
        $category = new Category([
            'name' => 'Electronicos',
            'description' => 'dispositivos electronicos no se profe por favor paseme el parcial en 5'
        ]);

        $this->assertEquals('Electronicos', $category->name);
        $this->assertEquals('dispositivos electronicos no se profe por favor paseme el parcial en 5', $category->description);
    }

    /** @test */
    public function it_can_update_category_name()
    {
        $category = new Category([
            'name' => 'viejo nombre',
            'description' => 'descripcion'
        ]);

        $category->name = 'nuevo nombre';

        $this->assertEquals('nuevo nombre', $category->name);
    }

    /** @test */
    public function it_has_products_relationship()
    {
        $category = new Category();
        $this->assertTrue(method_exists($category, 'products'));
    }
}