<?php

namespace App\Model;

/**
 * Description of ProductModel
 *
 * @author pablosousa <pablosousa.ads@gmail.com>
 * @package App\Model
 */
class ProductModel
{
    /**
     *
     * @var int 
     */
    private $id;
    
    /**
     *
     * @var string
     */
    private $name;
    
    /**
     *
     * @var float 
     */
    private $price;
    
    /**
     *
     * @var int
     */
    private $quantity;
    
    /**
     *
     * @var float 
     */
    private $total;

    /**
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * 
     * @param string $name
     * @return \App\Model\ProductModel
     */
    public function setName(string $name): ProductModel
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * 
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }
    
    /**
     * 
     * @param float $price
     * @return \App\Model\ProduProductModel
     */
    public function setPrice(float $price): ProduProductModel
    {
        $this->price = $price;
        return $this;
    }
    
    /**
     * 
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    
    /**
     * 
     * @param type $quantity
     * @return \App\Model\ProductModel
     */
    public function setQuantity($quantity): ProductModel
    {
        $this->quantity = $quantity;
        return $this;
    }
    
    /**
     * 
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): ProductModel
    {
        $this->total = $total;
        return $this;
    }
}
