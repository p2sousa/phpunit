<?php

namespace App\Query\Mysql;

use PHPUnit\Framework\TestCase;

/**
 * FilterTest
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Query\Mysql
 */
class FilterTest extends TestCase
{
    public function testWhere()
    {
        $filter = new Filter();
        $filter->where('id', '=', 1);
        
        $this->assertEquals(
            'WHERE id=1',
            $filter->getSql()
        );
    }
    
    public function testOrderBy()
    {
        $filter = new Filter();
        $filter->orderBy('name', 'ASC');
        
        $this->assertEquals(
            'ORDER BY name ASC',
            $filter->getSql()
        );
    }
    
    public function testWhereAndOrderBy()
    {
        $filter = new Filter();
        $filter->where('id', '=', 1);
        $filter->orderBy('name', 'ASC');
        
        $this->assertEquals(
            'WHERE id=1 ORDER BY name ASC',
            $filter->getSql()
        );
    }
}
