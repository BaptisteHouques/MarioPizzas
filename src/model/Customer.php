<?php

namespace src\model;

class Customer {
    protected $name;
    public $cart;

    public function __construct($name){
        $this->name = $name;
    }

    public function addCart($cart){
        $this->cart = $cart;
    }
}

?>