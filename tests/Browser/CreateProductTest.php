<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Category;

class CreateProductTest extends DuskTestCase
{
    public function test_create_product()
    {
        $category = Category::create([
            'name' => 'ajbsdjhabsdjbhas',
            'description' => 'Descripción',
        ]);

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('/products/add')
                    ->assertSee('Agregar Producto')
                    ->type('name', 'Producto de prueba')
                    ->type('price', '100')
                    ->type('quantity', '10')
                    ->select('category_id', $category->id)
                    ->press('Guardar');
        });
    }
}
