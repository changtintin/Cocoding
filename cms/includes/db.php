<?php
    $db['host'] = "localhost";
    $db['user'] = "root";
    $db['password'] = "root";
    $db['db_name'] = "cms";
    
    define('CATER_TABLE', "categories");
    define('POSTS_TABLE', "posts");
    define('COMMENTS_TABLE', "comments");
    define('USERS_TABLE', "users");
    define('LIKES_TABLE', "likes");



    foreach($db as $key => $value){
        $upper = strtoupper($key);
        define($upper, $value); // declare constant
    }
    $connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

    if(!$connect){
        echo "Connection Failed";
    }
?>