<?php

    header('Content-type: text/plain');
    include "./Class/Duck.php";
    // $rubber = new RubberDuck();
    // $rubber -> display();
    // $rubber -> performQuack();
    $mallard = new MallardDuck();
    $mallard -> display();
    echo "fly behavior before setting: ";
    $mallard -> performFly();
    $mallard -> setFlyBehavior(new FlyRocketPowered);
    echo "fly behavior after setting: ";
    $mallard -> performFly();
    // echo "_____________________________________\n";

    // $model = new ModelDuck();

    // $model -> display();

    // $model -> performFly();

    // $model -> setFlyBehavior(new FlyRocketPowered());

    // $model -> performFly();

    // echo "_____________________________________\n";

    // $hunter = new DuckCall($mallard);

    // $hunter -> fakeDuck -> display();

    // $hunter -> fakeDuck -> performQuack();

?>