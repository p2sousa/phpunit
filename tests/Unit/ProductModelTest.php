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
    /**
     * @dataProvider collectionData
     */
    public function testEncapsulate($property,$expected,$actual)
    {
        global $db;
        
        $product = new ProductModel($db);
        $this->assertInstanceOf(
            ProductModel::class,
            $product->{'set'. ucfirst($property)}($actual)
        );
        
        $this->assertEquals(
            $expected, 
            $product->{'get'. ucfirst($property)}()
        );
    }
    
    public function collectionData()
    {
        return [
            ['name','Computer','Computer'],
            ['price',1500.00,1500],
            ['quantity',2,2],
            ['total',3000,3000],
        ];
    }
}
