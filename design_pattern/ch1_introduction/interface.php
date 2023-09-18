<?php

interface FruitSize{
    public function size();
}
class Smaller implements FruitSize{
    public function size(){
        echo "Smaller than apple";
    }
}

class Bigger implements FruitSize{
    public function size(){
        echo "Bigger than apple";
    }
}

// abstract class Fruit{
//     public $name;
//     public $color;
//     abstract public function getSize();
//     abstract public function setInfo($n, $c);
// }

// class Kiwi extends Fruit{
//     public function setInfo($n, $c){
//         $this -> name = $n;
//         $this -> color = $c;
//         echo $this -> name."<br>";
//         echo $this -> color."<br>";
//     }

//     public function getSize(){
//         $s  = new Smaller();
//         $s -> size();
//     }
// }

class Pamelo{
    public $name;
    public $color;
    function __construct($n, $c){
        $this -> name = $n;
        $this -> color = $c;
        echo $this -> name."<br>";
        echo $this -> color."<br>";
    }

    public function BiggerSize(){
        echo "Bigger than apple";
    }
}