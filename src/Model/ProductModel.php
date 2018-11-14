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
     * @var \PDO 
     */
    private $pdo;
    
    /**
     * ProductModel constructor.
     * 
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

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
    public function setPrice(float $price): ProductModel
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
    
    /**
     * setting database data in the model
     * 
     * @param array $data
     * @return void
     */
    private function hydrate(array $data): void
    {
        $this->id = $data['id'];
        $this
            ->setName($data['name'])
            ->setPrice($data['price'])
            ->setQuantity($data['quantity'])
            ->setTotal($data['total']);
    }
    
    /**
     * persist Insert data in database
     * 
     * @param array $data
     * @return \App\Model\ProductModel
     */
    public function save(array $data): ProductModel
    {
        $query = "INSERT INTO products ("
            . "`name`,"
            . " `price`,"
            . " `quantity`,"
            . " `total`) VALUES ("
            . " :name"
            . " :price,"
            . " :quantity,"
            . " :total)";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":name", $data['name']);
        $stmt->bindValue(":price", $data['price']);
        $stmt->bindValue(":quantity", $data['quantity']);
        $data['total'] = $data['price'] * $data['quantity'];
        $stmt->bindValue(":total", $data['total']);
        
        $stmt->execute();
        
        $data['id'] = $this->pdo->lastInsertId();
        $this->hydrate($data);
        return $this;
    }
    
    /**
     * Find all
     * 
     * @return array
     */
    public function all(): array
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
