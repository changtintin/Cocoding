<?php

    /* 
        NOTE
        =====================

        1. interface do not have property

        2. It should be public function
        
    */

    interface FlyBehavior{
        public function fly();            
    }

    class Flywithwings implements FlyBehavior{
        public function fly(){
            echo "I'm flying!!\r\n";
        }
    }

    class FlynoWay implements FlyBehavior{
        public function fly(){
            echo "I cannot fly TT\r\n";
        }
    }

    class FlyRocketPowered implements FlyBehavior{
        public function fly(){
            echo "I'm flying like a freaking rocket\r\n";
        }
    }


?>