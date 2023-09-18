<?php
    include "./Character.php";

    header('Content-type: text/plain');

    $charles = new King();

    $charles -> displayName();

    $charles -> setWeapon(new SwordBehavior());

    $charles -> fight();

    echo "_____________________________________\n";

    $sam = new Knight();

    $sam -> displayName();

    $sam -> setWeapon(new AxeBehavior());

    $sam -> fight();

?>