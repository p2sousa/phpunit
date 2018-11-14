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
        
        print_r($result);
    }
}
