<?php
    
    /*
        Navbar router
    */
    foreach($zh_tw_json["navbar"] as $key => $val){
        if(isset($_GET[$key])){
            include "./include/content/".$key."/".$key.".php";
        }
    }

    /*
        Intro router
    */
    foreach($zh_tw_json["intro_sec_theme"] as $key => $val){
        if(isset($_GET[$key])){
            include "./include/content/intro/".$key.".php";
        }
    }

    if(empty($_GET)){
        include "./include/content/home.php";
    }
?>