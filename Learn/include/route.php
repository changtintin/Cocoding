<?php

    if (isset($_GET['designPattern'])) {

        include "./include/content/designPattern/Observer.php";
    } 
    else if (isset($_GET['JS'])) {

        /* JS DOM Event */
        include "./include/content/JS/DOM.php";

        /* JS BOM */
        include "./include/content/JS/BOM.php";

        /* JS API */
        include "./include/content/JS/API.php";
    } 
    else if(isset($_GET['IntersectionObserver'])){
        
        include "./include/content/IntersectionObserver/IntersectionObserver.php";
    }
    else {

        include "./include/content/home.php";
        
    }

?>