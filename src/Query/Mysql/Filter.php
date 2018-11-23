<?php

namespace App\Query\Mysql;

/**
 * Filter
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Query\Mysql
 */
class Filter
{
    /**
     *
     * @var array
     */
    private $sql;
    
    /**
     * 
     * @param string $field
     * @param string $condition
     * @param type $value
     * @return \App\Query\Mysql\Filter
     */
    public function where(string $field, string $condition, $value): Filter
    {
        $where = 'WHERE %s%s%s';
        $this->sql[] = sprintf($where, $field, $condition, $value);
        
        return $this;
    }
    
    /**
     * 
     * @param string $field
     * @param string $by
     * @return \App\Query\Mysql\Filter
     */
    public function orderBy(string $field, string $by): Filter
    {
        $order = 'ORDER BY %s %s';
        $this->sql[] = sprintf($order, $field, $by);
        
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getSql(): string
    {
        return implode(' ', $this->sql);
    }
}
