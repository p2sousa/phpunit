<?php

namespace App\Query\Mysql;

/**
 * Select
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 */
class Select
{
    /**
     *
     * @var string 
     */
    private $table;
    
    /**
     *
     * @var array 
     */
    private $fields;
    
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
     * @param array $fields
     * @return \App\Query\Mysql\Select
     */
    public function fields(array $fields): Select
    {
        $this->fields = $fields;
        return $this;
    }


    /**
     * 
     * @return string
     */
    public function getSql(): string
    {
        $fields = '*';
        
        if ($this->fields) {
            $fields = implode(', ', $this->fields);
        }
        
        return sprintf("SELECT %s FROM %s;", $fields, $this->table);
    }
}
