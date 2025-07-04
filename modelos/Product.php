<?php
class Product {
    /** @var int|null */
    public $id;
    /** @var string */
    public $name;
    /** @var float */
    public $price;

    /**
     * @param int|null   $id
     * @param string     $name
     * @param float      $price
     */
    public function __construct($id, $name, $price) {
        $this->id    = $id;
        $this->name  = $name;
        $this->price = $price;
    }
}
