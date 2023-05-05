<?php 
    include "function.php";

    $sid = session_id();

    $sql = "DELETE FROM ".ONLINE." WHERE session = '{$sid}'";
    $result = mysqli_query($connect, $sql);
    if($result){
       session_unset();

        $msg = "User Logout";
        header("Location: ../index.php?confirm_msg={$msg}");
    }
   

    
?>
