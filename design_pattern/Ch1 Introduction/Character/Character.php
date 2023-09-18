<?php

    include "./WeaponBehavior.php";

    abstract class  Character{

        public $weapon;

        abstract public function fight();

        function displayName(){
            echo "I'm " . get_class($this) . "\n";             
        }

        function setWeapon(WeaponBehavior $choosenWeapon){
            $this -> weapon = $choosenWeapon;
        }
    }

    class King extends Character{
        function fight(){
            $this -> weapon -> useWeapon();
        }
    }

    class Queen extends Character{
        function fight(){
            $this -> weapon -> useWeapon();
        }
    }

    class Troll extends Character{
        function fight(){
            $this -> weapon -> useWeapon();
        }
    }

    class Knight extends Character{
        function fight(){
            $this -> weapon -> useWeapon();
        }
    }
?>