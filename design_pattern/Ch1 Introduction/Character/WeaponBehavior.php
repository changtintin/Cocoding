<?php
    interface WeaponBehavior{
       function useWeapon();
    }

    class KnifeBehavior implements WeaponBehavior{
        function useWeapon(){
            echo "Cutting with a knife\n";
        }
    }

    class ArrowBehavior implements WeaponBehavior{
        function useWeapon(){
            echo "Shooting with a bow\n";
        }
    }

    class AxeBehavior implements WeaponBehavior{
        function useWeapon(){
            echo "Chopping with an axe\n";
        }
    }

    class SwordBehavior implements WeaponBehavior{
        function useWeapon(){
            echo "Swinging a sword\n";
        }
    }
?>