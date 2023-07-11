<?php
    if(!isset($_SESSION))
        session_start();
    ob_start(); //buffering our request
    include "../includes/function.php";    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>COCODING - User Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Cocoding/admin/css/bootstrap.main.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Cocoding/admin/css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Cocoding/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loader CSS -->
    <link href="/Cocoding/admin/css/loader.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    <!-- Latest compiled and minified Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../admin/css/summernote.css">

    <script src="../admin/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<style>
    .alert {
        padding: 20px;
        background-color:#f4edcd;
        color: #616161;
        font:bold;
        font-family: 'Courier New', monospace;
        margin-bottom: 15px;
    }

    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: #616161;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: #a0d7de;
    }
    
   
    

</style>

