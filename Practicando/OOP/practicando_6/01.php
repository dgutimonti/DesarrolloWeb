<?php 
include '../include/header.php';

class Product {
    public $name;
    public $price;
    public $available;


}

$product = new Product();
echo "<pre>";
var_dump($product);
echo "</pre>";
include '../include/footer.php';