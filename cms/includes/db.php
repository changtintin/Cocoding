<?php
    $db['host'] = "localhost";
    $db['user'] = "root";
    $db['password'] = "root";
    $db['db_name'] = "cms";
    
    define('CATER', "categories");
    define('POSTS', "posts");
    define('COMMENTS', "comments");
    define('USERS', "users");
    define('LIKES', "post_likes");

    define('HOST', "localhost");
    define('USER', "root");
    define('PASSWORD', "root");
    define('DB_NAME', "cms");

    
    $connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

    if(!$connect){
        echo "Connection Failed";
    }
?>