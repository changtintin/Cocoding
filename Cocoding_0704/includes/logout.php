<?php 
    include "function.php";

    $sid = session_id();

    $sql = "DELETE FROM ".ONLINE." WHERE session = '{$sid}'";
    $result = mysqli_query($connect, $sql);
    if($result){
        $lang = $_SESSION['lang'];
        session_unset();
        $_SESSION['lang'] = $lang;
        $msg = "User Logout";
        header("Location: ../index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}");
    }
?>
