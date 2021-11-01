<?php

namespace src\model;

class PizzasList{
    protected $list = [
        'margherita' => [6.00, ['tomatoes', 'mozzarella','olive_oil', 'basil']],
        'american' => [7.00, ['mushrooms', 'salami', 'black_olives', 'mozzarella', 'peppers']],
        'royal' => [5.50, ['ham', 'mushrooms','gruyere']]
    ];

    public function getList(){
        return $this->list;
    }

    public function showList(){
        print_r($this->list);
    }

    public function getPizzasNames(){
        return array_keys($this->list);
    }

    public function addPizza($name, $price, ...$ingredients){ //2nd argument allow several ingredients
        $this->list[$name] = [$price, $ingredients];
    }
}

?>