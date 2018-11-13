<?php
declare(strict_types = 1);

use App\Model\ProductModel;
use PHPUnit\Framework\TestCase;
/**
 * Description of ProductModelTest
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class ProductModelTest extends TestCase
{
    public function testSetAndGetName()
    {
        $product = new ProductModel();
        
        $this->assertInstanceOf(
            ProductModel::class,
            $product->setName("Computer")
        );
        
        $this->assertEquals("Computer", $product->getName());
    }
    
    public function testSetAndGetPrice()
    {
        $product = new ProductModel();
        
        $this->assertInstanceOf(
            ProductModel::class,
            $product->setPrice(235.00)
        );
        
        $this->assertEquals(235, $product->getPrice());
    }
    
    public function testSetAndGetQuantity()
    {
        $product = new ProductModel();
        
        $this->assertInstanceOf(
            ProductModel::class,
            $product->setQuantity(3)
        );
        
        $this->assertEquals(3, $product->getQuantity());
    }
    
    public function testSetAndGetTotal()
    {
        $product = new ProductModel();
        
        $this->assertInstanceOf(
            ProductModel::class,
            $product->setTotal(1500.99)
        );
        
        $this->assertEquals(1500.99, $product->getTotal());
    }
}
