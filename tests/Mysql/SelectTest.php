<?php

namespace App\Query\Mysql;

use PHPUnit\Framework\TestCase;

/**
 * Description of SelectTest
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class SelectTest extends TestCase
{
    public function testWithoutFilter()
    {
        $select = new Select();
        $select->setTable('products');
        
        $this->assertEquals(
            'SELECT * FROM products;', 
            $select->getSql()
        );
    }
    
    public function testSelectWhitFilter()
    {
        $select = new Select();
        
        $select->setTable('products');
        $select->fields(['name', 'email']);
        
        $this->assertEquals(
            'SELECT name, email FROM products;',
            $select->getSql()
        );
    }
}
