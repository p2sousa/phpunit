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
     * @var Filter
     */
    private $filter;


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
     * @param \App\Query\Mysql\Filter $filter
     * @return void
     */
    public function filter(Filter $filter): void
    {
        $this->filter = $filter->getSql();
    }

    /**
     * 
     * @return string
     */
    public function getSql(): string
    {
        $fields = '*';
        $filter = '';
        
        if ($this->fields) {
            $fields = implode(', ', $this->fields);
        }
        
        if ($this->filter) {
            $filter = ' ' . $this->filter; 
        }
        
        return sprintf("SELECT %s FROM %s%s;", $fields, $this->table, $filter);
    }
}
