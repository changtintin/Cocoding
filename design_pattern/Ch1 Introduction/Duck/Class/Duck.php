<?php
    include "FlyBehavior.php";

    include "QuackBehavior.php";

    abstract class Duck{

        public FlyBehavior $flyBehavior;

        public QuackBehavior $quackBehavior;

        function __construct(){}

        abstract public function display();

        function setFlyBehavior(FlyBehavior $flyAction){

            $this -> flyBehavior = $flyAction;

        }
    
        function setQuackBehavior(QuackBehavior $quackAction){

            $this -> quackBehavior = $quackAction;

        }
    
        function performFly(){

            $this -> flyBehavior -> fly();

        }
    
        function performQuack(){

            $this -> quackBehavior -> quack();

        }
    
        function swim(){

            echo "All duck float!";

        }   
        
    }

    class MallardDuck extends Duck{    

        function __construct(){

            $this -> quackBehavior = new Quack();

            $this -> flyBehavior = new FlyWithWings();

        }
    
        function display(){

            echo "I'm a real Mallard duck\n";

        }
    }

    class RedheadDuck extends Duck{    

        function __construct(){

            $this -> quackBehavior = new Quack();

            $this -> flyBehavior = new FlyWithWings();

        }
    
        function display(){

            echo "I'm a real Redhead duck\n";

        }
    }

    class ModelDuck extends Duck{

        function __construct(){

            $this -> quackBehavior = new Quack();

            $this -> flyBehavior = new FlynoWay();

        }

        function display(){       

            echo "I'm a model duck \n";
            
        }
    }

    class RubberDuck extends Duck{

        function __construct(){

            $this -> quackBehavior = new Squeak();            

        }

        function display(){

            echo "I'm a rubber duck\n";

        }
    }

    class DecoyDuck extends Duck{

        function display(){

            echo "I'm a decoy duck\n";

        }
    }
?>