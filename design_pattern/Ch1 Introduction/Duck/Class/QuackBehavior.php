<?php

    interface QuackBehavior{
        public function quack();
    }

    class  MuteQuack implements QuackBehavior{
        public function quack(){        
            echo ".......(Silence) \n";
        }
    }

    class  Quack implements QuackBehavior{
        public function quack(){        
            echo "QUACK \n";
        }
    }

    class  Squeak implements QuackBehavior{
        public function quack(){        
            echo "SQUEAK \n";
        }
    }

    class DuckCall implements QuackBehavior{
        public Duck $fakeDuck;

        function __construct(Duck $type){
            echo "(hunter)\n";
            $this -> fakeDuck = $type;
        }

        function quack(){            
            $this -> fakeDuck -> performQuack();            
        }

    }

?>