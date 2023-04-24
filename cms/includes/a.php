
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    
    
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
        define('ONLINE', "users_online");

        define('HOST', "localhost");
        define('USER', "root");
        define('PASSWORD', "root");
        define('DB_NAME', "cms");

        
        $connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

        if(!$connect){
            echo "Connection Failed";
        }
        
        
        if(isset($_GET['test'])){
  
            $sql = "SELECT * FROM ".ONLINE;
            $q = mysqli_query($connect, $sql);
            if($q){
                if(mysqli_num_rows($q)>0){
                    $r = mysqli_num_rows($q);
                    $respnse = array();
                    echo "<h2>Online: {$r}</h2>";
                }
            }

        }

       
    ?>
</body>
</html>