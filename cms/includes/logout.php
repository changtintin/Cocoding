<?php 
    include "db.php";
    include "function.php";
    
    // Send a variable across the pages
    session_start();
    
    // $_SESSION['username'] = null;
    // $_SESSION['firstname'] = null;
    // $_SESSION['lastname'] = null;
    // $_SESSION['user_role'] = null;
    session_unset();

    $msg = "User Logout";
    header("Location: ../index.php?confirm_msg={$msg}");
?>
