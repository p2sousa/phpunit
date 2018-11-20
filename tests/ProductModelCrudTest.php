<?php
declare(strict_types = 1);

use App\Model\ProductModel;
use PHPUnit\Framework\TestCase;
/**
 * Description of ProductModelCrudTest
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class ProductModelCrudTest extends TestCase
{    
    public function testIfProductIsSaved()
    {
        global $db;
        
        $product = new ProductModel($db);
        $result = $product->save([
            "name" => "Smartphone",
            "price" => 1500.00,
            "quantity" => 2
        ]);
        
        $this->assertEquals(1, $product->getId());
        $this->assertEquals('Smartphone', $product->getName());
        $this->assertEquals(1500, $product->getPrice());
        $this->assertEquals(2, $product->getQuantity());
        $this->assertEquals(1500*2, $product->getTotal());
    }
    
    public function testIfListProducts()
    {
        global $db;
        
        $product = new ProductModel($db);
        $result = $product->save([
            "name" => "Smartphone",
            "price" => 1500.00,
            "quantity" => 2
        ]);
        
        $products = $product->all();
        $this->assertCount(2, $products);
    }
}
