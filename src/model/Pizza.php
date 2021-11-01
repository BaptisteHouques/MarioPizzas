<?php
namespace src\model;

class Pizza{
    protected $name;
    protected $price = 3; //Default custom pizza price
    protected $ingredients = [];

    public function __construct($pizzasList = null, $name = null){ //If the 2 arguments are null the pizza is a custom one
        if($pizzasList != null){
            $pizzasNames = $pizzasList->getPizzasNames();
        }
        if($name != null && $pizzasList != null){
        //Verify if the pizza exist in pizzaList object
            if(!in_array($name, $pizzasNames)){
                echo "Pizza doesn't exist\n";
            }
            else{
                $list = $pizzasList->getList();
                $this->name = $name;
                $this->price = $list[$name][0];
                $this->ingredients = $list[$name][1];
            }
        }
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function showIngredients(){
        print_r($this->ingredients) . "\n";
    }

    public function showAll(){
        $string = "\nName : ".$this->getName() . " | Price : ". $this->getPrice() . "\n Ingredients : ";
        foreach($this->ingredients as $ingredient){
            $string .= $ingredient . " ";
        }
        echo $string . "\n";
    }

    public function addIngredients($ingredientsList, ...$ingredients){ //2nd argument allow several ingredients
        $list = $ingredientsList->getList();
        foreach($ingredients as $ingredient){
            if(!array_key_exists($ingredient, $list)){
                echo "Ingredient " . $ingredient . " doesn't exist";
            }
            else{
                array_push($this->ingredients, $ingredient);
                $this->price += $list[$ingredient];
            }
        }
    }

    public function removeIngredients(...$ingredients){ //Argument allow several ingredients
        foreach($ingredients as $ingredient){
            if (($key = array_search($ingredient, $this->ingredients)) !== false) {
                unset($this->ingredients[$key]);
            }
            else {
                echo "ERROR : There is no " . $ingredient . " in " . $this->name . "\n";
            }
        }
    }
}