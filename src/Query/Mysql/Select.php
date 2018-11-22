<?php

namespace App\Query\Mysql;

/**
 * Select
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class Select
{
    private $table;
    
    /**
     * 
     * @param string $table
     * @return \App\Query\Mysql\Select
     */
    public function setTable(string $table): Select
    {
        $this->table = $table;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getSql(): string
    {
        return "SELECT * FROM products";
    }
}
