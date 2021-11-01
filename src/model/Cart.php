<?php

namespace src\model;

class Cart {
    protected $list = [];
    protected $totalPrice;

    public function getPrice(){
        $this->calcPrice();
        return $this->totalPrice;
    }

    public function viewCart(){
        $this->calcPrice();

        $render = "";
        $compt = 1;
        $name;
        $price;
        foreach($this->list as $list){
            $name = $list->getName();
            $price = $list->getPrice();
            $render .= $compt++ . " : ". $name ." : ". $price ."\n";
        }
        $render .= "Total Price : " . $this->totalPrice . "\n";

        echo $render;
    }

    //The object must be an instance of Pizza (to have the getPrice method)
    public function add(Pizza $object){
        array_push($this->list, $object);
    }

    public function remove($name){
        if (($key = array_search($name, $this->list)) !== false) {
            unset($this->list[$key]);
        }
    }

    //Call getPrice() method in Pizza on each elements in the list
    public function calcPrice(){
        foreach($this->list as $list){
            $this->totalPrice += $list->getPrice();
        }
    }
}

?>