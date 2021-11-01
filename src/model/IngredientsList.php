<?php

namespace src\model;

class IngredientsList {
    protected $list = [
        'tomatoes' => 1.00, 'mozzarella' => 1.50, 'olive_oil' => 0.50, 'basil' => 0.50,
        'mushrooms' => 1.00, 'salami' => 1.50, 'black_olives' => 1.00, 'peppers' => 1.00,
        'ham' => 1.50, 'gruyere' => 0.50
    ];

    public function getList(){
        return $this->list;
    }

    public function showList(){
        print_r($this->list);
    }

    public function addIngredient($name, $price){
        $this->list[$name] = $price;
    }
}
?>