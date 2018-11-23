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
    public function testWithoutFields()
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
        
        
        $stub = $this->getMockBuilder(Filter::class)
            ->disableOriginalConstructor()
            ->getMock();
        
        $stub->method('getSql')
            ->willReturn('WHERE id=1 ORDER BY name ASC');
        
        $select->filter($stub);
        
        $this->assertEquals(
            'SELECT * FROM products WHERE id=1 ORDER BY name ASC;', 
            $select->getSql()
        );
    }
    
    public function testSelectWhitFields()
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
