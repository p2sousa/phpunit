<?php

namespace App\Query\Mysql;

use PHPUnit\Framework\TestCase;

/**
 * SelectAndFilterIntegrationTest
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class SelectAndFilterIntegrationTest extends TestCase
{
    public function testSelectWhithFilterAndWhereAndOrder()
    {
        $select = new Select();
        $select->setTable('products');
        
        $filter = new Filter();
        $filter->where('id', '=', 1);
        $filter->orderBy('name', 'ASC');
        
        $select->filter($filter);
        
        $this->assertEquals(
            'SELECT * FROM products WHERE id=1 ORDER BY name ASC;', 
            $select->getSql()
        );
    }
}
