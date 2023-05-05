<?php 
    
    include "function.php";
    
    // Send a variable across the pages
    session_start();
    $sid = session_id();
    echo $sid."<br>";
    $sql = "DELETE * FROM ".ONLINE." WHERE session = '{$sid}'";
    $result = mysqli_query($connect, $sql);
    if(!$result){
        echo "Error";
    }
    else{
        echo "OK";
    }

    session_unset();

    $msg = "User Logout";
    header("Location: ../index.php?confirm_msg={$msg}");
?>
