<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_product_creation()
    {
      $product = Product::create([
         'name' => 'Test Product',
         'price' => 99.99,
         'quantity' => 10
        ]);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Test Product', $product->name);
        $this->assertEquals(99.99, $product->price);
        $this->assertEquals(10, $product->quantity);
    }

    public function test_product_validation()
    {
         $this->expectException(\Illuminate\Database\QueryException::class);
    // Intenta crear un producto sin nombre, lo cual debería fallar
         Product::create([
         'price' => 99.99,
         'quantity' => 10
        ]);
    }
    public function test_calculate_total_value()
    {
        $product = Product::create([
         'name' => 'Test Product',
         'price' => 99.99,
         'quantity' => 10
        ]);
    // Método para calcular el valor total del inventario
        $totalValue = $product->calculateTotalValue();
        $this->assertEquals(999.90, $totalValue);
    }

}
