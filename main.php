<?php
    require_once('src/model/IngredientsList.php');
    require_once('src/model/Customer.php');
    require_once('src/model/Cart.php');
    require_once('src/model/Pizza.php');
    require_once('src/model/PizzasList.php');
    use src\model\IngredientsList;
    use src\model\Customer;
    use src\model\Cart;
    use src\model\Pizza;
    use src\model\PizzasList;

    //Creation of Ingredients and Pizzas list
    $ingredientsList = new IngredientsList();
    $pizzasList = new PizzasList();

    //Customer A
    $customerA = new Customer('A');
    $cartA = new Cart();
    $customerA->addCart($cartA);

    $pizza1 = new Pizza($pizzasList, 'margherita');
    $pizza2 = new Pizza($pizzasList, 'american');
    $pizza3 = new Pizza($pizzasList, 'royal');
    
    $customerA->cart->add($pizza1);
    $customerA->cart->add($pizza2);
    $customerA->cart->add($pizza3);
    echo "The amount of your cart is : " . $customerA->cart->getPrice() ."\n";

    //Mario Intervention
    $mario = new Customer('Mario');
    $ingredientsList->addIngredient('Raclette_cheese', 1.50);
    $ingredientsList->addIngredient('Potatoes', 1.50);
    $pizzasList->addPizza('raclette', 8.00, 'potatoes', 'raclette_cheese', 'basil', 'ham');

    //Customer B
    $customerB = new Customer('B');
    $cartB = new Cart();
    $customerB->addCart($cartB);
    $pizza4 = new Pizza($pizzasList, 'raclette');
    $pizza4->removeIngredients('raclette_cheese');
    $pizza4->addIngredients($ingredientsList, 'salami');
    $customerB->cart->add($pizza4);
    echo "The amount of your cart is : " . $customerB->cart->getPrice() ."\n";

    //Customer C
    $customerC = new Customer('C');
    $cartC = new Cart();
    $customerC->addCart($cartC);
    $pizza5 = new Pizza();
    $pizza5->addIngredients($ingredientsList, 'tomatoes', 'basil', 'ham', 'black_olives', 'gruyere');
    $customerC->cart->add($pizza5);
    echo "The amount of your cart is : " . $customerC->cart->getPrice();
?>