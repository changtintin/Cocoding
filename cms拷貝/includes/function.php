<?php
    //db.php
    define('CATER', "categories");
    define('POSTS', "posts");
    define('COMMENTS', "comments");
    define('USERS', "users");
    define('LIKES', "post_likes");
    define('ONLINE', "users_online");
    define('TAGS', "tags");

    define('HOST', "localhost");
    define('USER', "root");
    define('PASSWORD', "root");
    define('DB_NAME', "cms");

    
    $connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);

    if(!$connect){
        echo "Connection Failed";
    }
    
    function insert_cater(){
        global $connect;
        // Add Catergory
        if(isset($_POST['new_cater_submit'])){
            $new_cater_add = esc($_POST['new_cater_add'],$connect);

            if($new_cater_add != null){
                $sql = "INSERT INTO ". CATER ." (cat_title) VALUES ('{$new_cater_add}');";                
                $query = mysqli_query($connect, $sql);
                $msg = query_confirm($query);
                header("Location: http://localhost:8888/cms/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
            else{
                // Alert Box: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_alert

                echo "<div id = 'alert_add'>
                        <div class='alert' >
                            <span class='closebtn' onclick='close_alert_add()'>&times;</span>
                            This Field should not be empty!!!!
                        </div> 
                    </div>";
            }
        }
    }

    function edit_cater(){
        global $connect;
        //Edit catergory
        if(isset($_GET['edit_cater_submit'])){
            $edit_cater_name = esc($_GET['edit_cater_name'], $connect);
            $edit_cater_submit = esc($_GET['edit_cater_submit'], $connect);

            if($edit_cater_name != null){
                $sql = "UPDATE ". CATER ." SET cat_title = '{$edit_cater_name}' WHERE cat_title = '{$edit_cater_submit}';";
                $query = mysqli_query($connect, $sql);
                if(!$query){
                    die("Error".mysqli_error($connect));
                }
                
                $msg = query_confirm($query);   
                header("Location: http://localhost:8888/cms/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
            else{
                $r = "\"ok\"";
                echo "<div id = 'alert_edit'>
                        <div class='alert' >
                            <span class='closebtn' onclick='close_alert_edit({$r})'>&times;</span>
                            This Field should not be empty!!!!
                        </div> 
                    </div>";
            }
        }
    }

    function delete_cater(){      
        global $connect;
        //Delete catergory
        if(isset($_GET['delete_id'])){
            echo "OK";
            $del_id = esc($_GET['delete_id'], $connect);
            $sql = "DELETE FROM ". CATER . " WHERE cat_id = '{$del_id}';";
            echo $sql;
            $delete_cater = mysqli_query($connect, $sql);
            if(!$delete_cater){                
                echo "Error";
            }
            $msg = query_confirm($delete_cater);   
            header("Location: http://localhost:8888/cms/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
            exit();
        }  
    }

    function fetch_all_cater(){
        global $connect;
        $q = "SELECT * FROM ". CATER;
        $select_cater_sidebar = mysqli_query($connect, $q);
        if($select_cater_sidebar){
            while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                $title = $fetch_row['cat_title'];
                $id = $fetch_row['cat_id'];
                echo "<li>
                    <a href='category.php?cat={$id}' target='_blank' rel='noopener noreferrer'> 
                        {$title} 
                    </a>
                </li>";
            }
        }
    }

    function fetch_partof_cater(){
        global $connect;

        $q = "SELECT * FROM ". CATER;
        $select_cater_sidebar = mysqli_query($connect, $q);
        if($select_cater_sidebar){
            $i = 0;
            if(mysqli_num_rows($select_cater_sidebar) > 0){
                while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                    if($i > 4)
                        break;
                    $title = $fetch_row['cat_title'];
                    $id = $fetch_row['cat_id'];
                    echo "<li>
                        <a href='category.php?cat={$id}' style='font-family: Open Sans, sans-serif; font-size: smaller;'> {$title} </a>
                    </li>";
                    $i++;

                }
            }
        }

    }

    // STATUS COL
    function query_confirm($q){
        global $connect;
        if(!$q){   
            return die("ERROR<br>".mysqli_error($connect));
        }
        else{
            return "Request Success";
        }
    }

    // STATUS COL
    function query_msg_alert(){
        if(isset($_GET['confirm_msg'])){
            $m = $_GET['confirm_msg'];
            $sim = similar_text($m, 'ERROR', $perc);
            $sim2 = similar_text($m, 'Wrong', $perc);
            $sim3 = similar_text($m, "You can't", $perc);
            $r = "\"ok\"";
            if($sim >= 5 ||  $sim2 >= 5 || $sim3 >= 7){
                $m = "<span class='glyphicon glyphicon-remove'></span> ".$m;
            }
            else{
                $m = "<span class='glyphicon glyphicon-ok'></span> ".$m;
            }

            echo "
                <div id = 'alert_edit'>
                    <div class='alert' >
                        <span class='closebtn' onclick='close_alert_edit({$r})'>&times;</span>".$m
                        ."
                    </div> 
                </div>
            ";
            
        }
    }

    function add_posts($role){
        global $connect;
        if(isset($_POST['create_post'])){
            $title = esc($_POST['title'], $connect);

            if(isset($_SESSION['username']))
                $author = $_SESSION['username'];
            else
                $author = esc($_POST['author'], $connect);
            
            
            if(isset($_SESSION['username']))
                $author_id = $_SESSION['user_id'];
            else
                $author_id = -1;
            
            $status = esc($_POST['status'], $connect);
            $img = esc($_FILES['img']['name'],$connect);
            $img_tmp = esc($_FILES['img']['tmp_name'], $connect);
            
            
            $date = esc($_POST['date'], $connect);
            $cater_id = esc($_POST['cater_id'], $connect);
            $post_content = $_POST['post_content'];
            $post_content = base64_encode($post_content);

            move_uploaded_file($img_tmp,"../image/$img");
    
            $sql = "INSERT INTO posts(post_title, post_author, post_date, post_image,post_status, post_cater_id, post_content, post_author_id)";
            $sql .= " VALUES('{$title}','{$author}','{$date}','{$img}','{$status}',{$cater_id},'{$post_content}', '{$author_id}');";            
            $query = mysqli_query($connect, $sql);            

            if($query){
                // fetch the last created id                
                $new_post_id = mysqli_insert_id($connect);
                
                save_tag($new_post_id, $connect);

                if($role == "user"){
                    $msg = ' Post Created, <a href="user_posts.php?source=user_add_posts"> Want to pose more? </a>';
                    $msg .= '<a href="../post.php?p_id='.$new_post_id.'"> , View your new post </a>';
                    header("Location: http://localhost:8888/cms/user/user_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit();  
                }  
                else{
                    $msg = ' Post Created, <a href="admin_posts.php?source=admin_add_posts"> Want to pose more? </a>';
                    $msg .= '<a href="../post.php?p_id='.$new_post_id.'"> , View your new post </a>';
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit();
                }                                
                echo "ok";
            }
            else{
                echo "Error";
            }        
        }
    }

    function delete_post_comment($table, $id_name){
        global $connect;
        echo "Del";
        
        // $_POST['select_posts'] is an array
        foreach($_POST['select_ary'] as $checkbox){
            $sql = "DELETE FROM ".$table." WHERE {$id_name} = '{$checkbox}' ";
            $q = mysqli_query($connect, $sql);
        }
        $msg = query_confirm($q);     
        return $msg;
    }

    function edit_post($result_img, $id){        
        global $connect;
        if(isset($_POST['edit_post'])){
            $title = esc($_POST['title'], $connect);
            $author = esc($_POST['author'], $connect);
            $status = esc($_POST['status'], $connect);
            $date = esc($_POST['date'], $connect);

            $post_content = $_POST['post_content'];
            $post_content = base64_encode($post_content);

            $cater_n = esc($_POST['cater_n'], $connect);
            $img = $_FILES['img']['name'];                        
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp,"../image/$img");

            if(empty($img)){
                $img = $result_img;
            }

            $sql = "SELECT cat_id FROM ".CATER." WHERE cat_title = '{$cater_n}'";
            $q = mysqli_query($connect, $sql);
            if(mysqli_num_rows($q) > 0){
                $result =  mysqli_fetch_assoc($q);
                $cater_id = $result['cat_id'];
            }

            $sql2 = "UPDATE ".POSTS." SET  post_title = '{$title}', post_author = '{$author}',";
            $sql2 .= " post_date = '{$date}', post_image = '{$img}',";
            $sql2 .= " post_status = '{$status}', post_cater_id = '{$cater_id}', post_content = '{$post_content}'";
            $sql2 .= " WHERE post_id = '{$id}';";                        
            save_tag($id, $connect);
            $query2 = mysqli_query($connect, $sql2);                        
            
            if($query2){
                $msg = ' Post Edited, <a href="../post.php?p_id='.$id.'"> View Post </a>';
                header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
            } 
            else{
                echo "False";
            } 
        }
    }

    function user_edit_post($result_img, $id){        
        global $connect;
        if(isset($_POST['edit_post'])){
            $title = esc($_POST['title'], $connect);                    
            $date = esc($_POST['date'], $connect);
            $post_content = $_POST['post_content'];
            $post_content = base64_encode($post_content);

            $cater_n = esc($_POST['cater_n'], $connect);
            $img = $_FILES['img']['name'];                        
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp,"../image/$img");

            if(empty($img)){
                $img = $result_img;
            }
            $sql = "SELECT cat_id FROM ".CATER." WHERE cat_title = '{$cater_n}'";
            $q = mysqli_query($connect, $sql);
            if(mysqli_num_rows($q) > 0){
                $result =  mysqli_fetch_assoc($q);
                $cater_id = $result['cat_id'];
            }

            $sql2 = "UPDATE ".POSTS." SET  post_title = '{$title}',";
            $sql2 .= " post_date = '{$date}', post_image = '{$img}',";
            $sql2 .= " post_cater_id = '{$cater_id}', post_content = '{$post_content}'";
            $sql2 .= " WHERE post_id = '{$id}';";
            save_tag($id, $connect);
            $query2 = mysqli_query($connect, $sql2);                        
            
            if($query2){
                $msg = ' Post Edited, <a href="../post.php?p_id='.$id.'"> View Post </a>';
                header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
            }   
        }
    }
    

    function approve_comments($status){
        global $connect;
        $setting = esc($_POST['comment_setting'], $connect);
        if($setting == 'Approved'||$setting == 'Unapproved'){
            foreach($_POST['select_ary'] as $checkbox){
                $sql = "UPDATE ".COMMENTS." SET comment_status = '{$status}' WHERE comment_id = {$checkbox}";
                $q = mysqli_query($connect, $sql);
            }
    
            $msg = query_confirm($q);     
            header("Location: http://localhost:8888/cms/admin/admin_comments.php?confirm_msg={$msg}", TRUE, 301);
            exit(); 
        }
    }

    function edit_post_status(){
        global $connect;
        
        if(isset($_POST['post_setting'])){
            $status = esc($_POST['post_setting'], $connect);
            switch($status){
                case "Spam":case "Published";case"Draft":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "UPDATE ".POSTS." SET post_status = '{$status}' WHERE post_id = {$checkbox}";
                        $q = mysqli_query($connect, $sql);
                    }
            
                    $msg = query_confirm($q);     
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
                
                case "Delete":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "DELETE FROM ".POSTS." WHERE post_id = '{$checkbox}' ";
                        $q = mysqli_query($connect, $sql);
                    }
                    $msg = query_confirm($q);     
                    
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
                
                case "Duplicate":
                    foreach($_POST['select_ary'] as $checkbox){
                        $query1 = "SELECT * FROM ".POSTS." WHERE post_id = '{$checkbox}';";
                        $result1 = mysqli_query($connect, $query1);
                        if($result1){
                            if(mysqli_num_rows($result1) > 0){
                                if($row = mysqli_fetch_assoc($result1)){
                                   
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    
                                    $post_status = $row['post_status'];
                                    $post_cater_id = $row['post_cater_id'];
                                    $post_content = $row['post_content'];

                                    $query2 = "INSERT INTO posts(post_title, post_author, post_date, post_tags, post_status, post_cater_id, post_content, post_image)";
                                    $query2 .= " VALUES('{$post_title}','{$post_author}','{$post_date}','{$post_tags}','{$post_status}',{$post_cater_id},'{$post_content}','$post_image');";
                                    $result2 = mysqli_query($connect, $query2);
                                }
                            }
                        }
                    }
            
                    $msg = query_confirm($result2);     
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
                
                case "ResetViews":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "UPDATE ".POSTS." SET post_view_count = '0' WHERE post_id = {$checkbox}";
                        $q = mysqli_query($connect, $sql);
                    }
            
                    $msg = query_confirm($q);     
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
            }
        }
    }

    function fetch_commented_post($p_id){
        global $connect;
        
        if($p_id > -1 ){
            $sql = "SELECT * FROM ".POSTS." WHERE post_id = '{$p_id}'";            
            $q = mysqli_query($connect, $sql);
            if(mysqli_num_rows($q) > 0){
                $result =  mysqli_fetch_assoc($q);
                if($result){
                    $comment_post_title = $result['post_title'];
                    
                    return $comment_post_title;
                }
            }
            else{
                return "*** Can't find the Article ***";
            }
        }
    }

    function add_comment($p_id, $role){
        global $connect;
        if(isset($_POST['create_comment'])){
            
            $email = esc($_POST['email'], $connect);
            $comment_content = base64_encode($_POST['comment_content']);
            

            if(empty($_POST['author'])&&isset($_SESSION['username'])){
                $author = $_SESSION['username'];

            }
            else{
                $author = $_POST['author'];
            }

            if(!empty($author) && !empty($email) && !empty($comment_content)){
                $sql = "INSERT INTO ".COMMENTS."(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date, comment_role) ";
                $sql .= "VALUE('{$p_id}', '{$author}', '{$email}', '{$comment_content}', 'Unapproved', now(), '{$role}')";
                echo $sql;
                $q = mysqli_query($connect, $sql);
                $msg = query_confirm($q);
                
                header("Location: http://localhost:8888/cms/post.php?p_id={$p_id}&confirm_msg={$msg}", TRUE, 301);
                exit();   
            }
            else{
                $msg = "ERROR, This field should not be empty";     
                header("Location: http://localhost:8888/cms/post.php?p_id={$p_id}&confirm_msg={$msg}", TRUE, 301);
                exit(); 
            }
        }
    }
    
    function select_all(){
        if(isset($_POST['select_all'])){
           echo "checked"; 
        }
        else if(isset($_POST['cancel_all'])){
            echo " ";
        }
    }

    function add_user(){
        if(isset($_POST['add_user'])){
            global $connect;
            $first_n = esc($_POST['first_n'], $connect);
            $last_n = esc($_POST['last_n'], $connect);
            $username = esc($_POST['username'], $connect);
            
            if(!empty($first_n) && !empty($last_n) && !empty($username)){
                $user_role = esc($_POST['role'], $connect);
                $user_email= esc($_POST['email'], $connect);
                $user_password = esc($_POST['password'], $connect);

                $sql = "INSERT INTO ".USERS."(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
                $sql .= "VALUE('{$first_n}', '{$last_n}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}' )";
                $q = mysqli_query($connect, $sql);
                $msg = query_confirm($q);
                header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
            else{
                // Alert Box: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_alert

                echo "<div id = 'alert_add'>
                        <div class='alert' >
                            <span class='closebtn' onclick='close_alert_add()'>&times;</span>
                            This Field should not be empty!!!!
                        </div> 
                    </div>";
            }
        }
    }

    function delete_users(){
        global $connect;
                
        //$_POST['select_ary'] is an array
        foreach($_POST['select_ary'] as $checkbox){
            $sql = "DELETE FROM ".USERS." WHERE user_id = '{$checkbox}'";
            $q = mysqli_query($connect, $sql);
        }
        $msg = query_confirm($q);     
        header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        exit();         
    }

    function edit_users($user_id){        
        global $connect;
        if(isset($_POST['edit_user'])){
            $first_n = esc($_POST['first_n'], $connect);
            $last_n = esc($_POST['last_n'], $connect);
            $username = esc($_POST['username'], $connect);
            $user_role = esc($_POST['role'], $connect);
            $user_email= esc($_POST['email'], $connect);
            $user_password = esc($_POST['password'], $connect);

            

            $sql2 = "UPDATE ".USERS." SET  user_firstname = '{$first_n}', user_lastname = '{$last_n}',";
            $sql2 .= " user_role = '{$user_role}', user_email = '{$user_email}', user_password = '{$user_password}', username = '{$username}'";
            $sql2 .= " WHERE user_id = '{$user_id}';";
            $query2 = mysqli_query($connect, $sql2);                        
            
            $msg = query_confirm($query2);     
            header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        }
    }

    function edit_profile($user_id){        
        global $connect;
        if(isset($_POST['edit_user'])){            
            $first_n = esc($_POST['first_n'], $connect);
            $last_n = esc($_POST['last_n'], $connect);
            $username = esc($_POST['username'], $connect);            
            $user_email= esc($_POST['email'], $connect);

            $sql2 = "UPDATE ".USERS." SET  user_firstname = '{$first_n}', user_lastname = '{$last_n}',";
            $sql2 .= " user_email = '{$user_email}', username = '{$username}'";
            $sql2 .= " WHERE user_id = '{$user_id}';";
            $query2 = mysqli_query($connect, $sql2);                        
            
            $msg = query_confirm($query2);     
            header("Location: http://localhost:8888/cms/user/user_profile.php?confirm_msg={$msg}", TRUE, 301);
        }
    }

    function switch_user_role($role){
        global $connect;

        foreach($_POST['select_ary'] as $checkbox){
            $sql = "UPDATE ".USERS." SET user_role = '{$role}' WHERE user_id = '{$checkbox}'";
            $q = mysqli_query($connect, $sql);
        }

        $msg = query_confirm($q);     
        header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        exit(); 
    }

    function fetch_row_count($table, $condition){
        global $connect;
        $sql = "SELECT * FROM {$table}{$condition};";
        $q = mysqli_query($connect, $sql);
        if($q){
            if(mysqli_num_rows($q)>0){
                $row_count = mysqli_num_rows($q);
                return $row_count;
            }
            else{
                return 0;
            }
        }
        return -1;
    }

    function register(){
        global $connect;

        if(isset($_POST['submit'])){
            $username = mysqli_escape_string($connect,$_POST['username']);
            $email = mysqli_escape_string($connect,$_POST['email']);
            $password = mysqli_escape_string($connect,$_POST['password']);
            $salt = "$2a$07$"."Sphinxofblackfoxelephjflks$";
            $en_password = crypt($password, $salt);

            $role = "Subscriber";
            $sql = "INSERT INTO ".USERS."(username, user_email, user_password, user_role, user_randSalt) VALUE('{$username}', '{$email}', '{$password}', '{$role}', '{$en_password}')";
            $q = mysqli_query($connect, $sql);
            if($q){
                $msg = "Congrats! You are our subscriber from now on.";
                header("Location: index.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
        }
    }

    function increase_view_count($connect, $p_id){
        $sql = "UPDATE ".POSTS." SET post_view_count = post_view_count + 1 WHERE post_id = ".$p_id;
        $q = mysqli_query($connect, $sql);
        if(!$q){
            die("Error").mysqli_error($connect, $q);
        }
    }

    function user_feel($connect, $p_id, $like){
        $p_id = esc($p_id, $connect);
        if(isset($_SESSION['user_role'])){
            $sql2 = "SELECT * FROM ".LIKES." WHERE user_id = ".$_SESSION['user_id']." AND post_id = ".$p_id;            
            $q2 = mysqli_query($connect, $sql2);
            if($q2){
                if(mysqli_num_rows($q2) > 0){
                    $row = mysqli_fetch_assoc($q2);

                    // If the user_feel is not the same, means change the like
                    if($row['user_feel'] != $like){
                        $sql4 = "UPDATE ". LIKES ." SET user_feel = '{$like}' WHERE user_id = '{$_SESSION['user_id']}' AND post_id = '{$p_id}';";
                        $q4 = mysqli_query($connect, $sql4);
                        if(!$q4){
                            die("Error").mysqli_error($connect, $q4);
                        }   

                        // Adjust the number of likes in post table
                        if($like == 'like'){
                            $condition = " SET post_like = post_like + 1, post_dislike = post_dislike - 1";
                        }
                        else{
                            $condition = " SET post_dislike = post_dislike + 1, post_like = post_like - 1";
                        }
                        $sql6 = "UPDATE " . POSTS . $condition . " WHERE post_id = " . $p_id;
                        
                        $q6 = mysqli_query($connect, $sql6);
                        if(!$q6){
                            die("Error").mysqli_error($connect, $q6);
                        }                        
                    }
                }
                else{
                    // NOT EXIST
                    $sql3 = "INSERT INTO ". LIKES ."(user_id, post_id, user_feel) VALUES('{$_SESSION['user_id']}', '{$p_id}', '{$like}');";
                    $q3 = mysqli_query($connect, $sql3);
                    if(!$q3){
                        die("Error").mysqli_error($connect, $q3);
                    }

                    // Adjust the number of likes in post table
                    if($like == 'like'){
                        $condition = " SET post_like = post_like + 1";
                    }
                    else{
                        $condition = " SET post_dislike = post_dislike + 1";
                    }

                    $sql5 = "UPDATE ". POSTS .$condition." WHERE post_id = " . $p_id;
                    
                    $q5 = mysqli_query($connect, $sql5);
                    if(!$q5){
                        die("Error").mysqli_error($connect, $q3);
                    }
                }
            }            
        }
        else{
            echo "Plz login !!!!!";
        }
    }

    function fecth_likes($connect){
        
        if(isset($_GET['fetch_likes']) || isset($_GET['fetch_dislikes']) && isset($_GET['p_id'])){ 
            $p_id = $_GET['p_id'];
            
            $sql = "SELECT * FROM ".POSTS." WHERE post_id = '{$p_id}';";
            $q = mysqli_query($connect, $sql);
            if($q){
                if(mysqli_num_rows($q) > 0){
                    $result = mysqli_fetch_assoc($q);
                    $likes = $result['post_like'];
                    $dislikes = $result['post_dislike'];

                    if(isset($_GET['fetch_likes'])){
                        echo $likes." users like this post";
                    }
                    else{
                        echo $dislikes." users dislike this post";
                    }
                }
            }
        }
    }
    
    function fetch_like_posts($connect, $id){
        $sql = "SELECT * FROM ".LIKES." WHERE user_id = '{$id}' AND user_feel = 'like';";
        $q = mysqli_query($connect ,$sql);
        if($q){
            if(mysqli_num_rows($q) > 0 ){
                while($result = mysqli_fetch_assoc($q)){                      
                    $sql2 = "SELECT * FROM ".POSTS. " WHERE post_id = '{$result['post_id']}'; ";
                    $q2 = mysqli_query($connect ,$sql2);
                    if($q2){
                        if(mysqli_num_rows($q2) > 0){
                            $t = mysqli_fetch_assoc($q2);
                            $title = $t['post_title'];
                            echo '
                                <a href="#" class="list-group-item">'.$title.'</a>
                            ';
                        }
                    }
                }
            }
        }
        else{
            echo mysqli_error($connect, $q);
        }        
    }

    function users_online($connect){
        if(isset($_GET['fetch_online'])){
            session_start();
            $session = session_id();
            $time = time();
            $time_out_sec = 60;
            $time_out = $time + $time_out_sec;                       

            $sql = "SELECT * FROM users_online WHERE session = '{$session}';";
            $q = mysqli_query($connect, $sql);
            if(!$q){
                die("Error").mysqli_error($connect, $q);
            }
            else{
                   
                if(mysqli_num_rows($q) > 0){
                    // user has been here
                    $sql2 = "UPDATE users_online(session, time) SET time = '{$time}' WHERE session = '{$session}'; ";
                    mysqli_query($connect, $sql2);
                }   
                else{
                    // new user login
                    $sql2 = "INSERT INTO users_online(session, time) VALUES('{$session}','{$time}')";
                    mysqli_query($connect, $sql2);
                }                                                
                
                $sql3 = "SELECT * FROM users_online WHERE time < {$time_out}; ";
                $q3 = mysqli_query($connect, $sql3);
                $user_count = mysqli_num_rows($q3); 
                echo $user_count;
            }
        }
    }
    
    users_online($connect);
    fecth_likes($connect);

    function comment_count($connect, $p_id){
        $sql = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = '{$p_id}';";
        $q = mysqli_query($connect, $sql);
        if($q){
            if(mysqli_num_rows($q)>0){
                $comment_count = mysqli_num_rows($q);
                return $comment_count;
            }
        }
        return 0;
    }

    function fetch_tags($p_id, $connect){
        $sql = "SELECT * FROM ".TAGS." WHERE post_id = ".$p_id;
        $r = mysqli_query($connect, $sql);
        if($r){
            if(mysqli_num_rows($r)>0){
                while($row = mysqli_fetch_assoc($r)){
                    echo "<a href = 'tag.php?name={$row['tag_name']}' style='color:#a8a3a3;'>#".$row['tag_name']."</a> ";

                }
            }
        }
    }

    function checkbox_tags($connect){
        $sql = "SELECT DISTINCT tag_name FROM ".TAGS;
        $r = mysqli_query($connect, $sql);
        if($r){
            if(mysqli_num_rows($r)>0){
                $i = 0;
                while($row = mysqli_fetch_assoc($r)){
                    echo "
                        <span class='badge badge-danger' style='margin:2px;'>
                            <input type='checkbox' class='form-check-input' id ='{$row['tag_name']}' name='select_ary[]' value = '{$row['tag_name']}'>   
                            <label for='{$row['tag_name']}' class = 'select-tag'> {$row['tag_name']} </label>
                        </span>
                    ";
                    $i++;
                    if($i % 5 == 0){
                        echo "<br>";
                    }
                }
            }
        }
    }

    function add_new_tag(){
        global $connect;
        if(isset($_GET['add_tags']) && isset($_GET['tag_name'])){
            $name = $_GET['tag_name'];
            echo "
                <span class='badge badge-warning' style='margin:2px; background-color:red;''>
                    <input type='checkbox' class='form-check-input' id ='{$name}' name='select_ary[]' value = '{$name}'>   
                    <label for='{$name}' class = 'select-tag' > {$name} </label>
                </span>
                ";
        }
    }
    add_new_tag();

    function save_tag($post_id, $connect){
        foreach($_POST['select_ary'] as $checkbox){
            $sql2 = "INSERT INTO ".TAGS."(post_id, tag_name) VALUES('{$post_id}','{$checkbox}')";
            $q2 = mysqli_query($connect, $sql2);
            if(!$q2){
                die("F").mysqli_error($connect, $q2);
            }
        }
    }

    // escape the string to prevent SQL injection
    function esc($str, $connect){
        echo $str;
        return mysqli_real_escape_string($connect, trim($str));
    }

    function isHTML($string){
        if($string != strip_tags($string)){
         // is HTML
         return true;
        }
        else{
         // not HTML
         return false;
        }
    }

    function show_content($content){
        $content_decode = base64_decode($content);
        if(isHTML($content_decode)){
            echo $content_decode;
        }   
        else{
            echo $content; 
        }    
    }

    function contact_email($connect){
        if(isset($_POST['contact_submit'])){
            $name = esc($_POST['name'], $connect);
            $from_email = $_POST['mail'];
            $message = $_POST['content'];
            $to_email = "tin871001@gmail.com";
            $subject = esc($_POST['subject'], $connect);
            $headers = "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            $headers .= "From:" . $from_email . "\r\n";

            $message = wordwrap($message, 70, "\r\n");
            $message = "
                <!DOCTYPE html>
                <html>
                <head>
                </head>
                <body>
                <table rules='all' border='1' style='border-color: #666;' cellpadding='10'>
                <tr style='background: #eee;'><td colspan='2'><strong>COCODING --> User Report</strong> </td></tr>
                <tr>
                    <td><strong>From:</strong></td>
                    <td>".$name."</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>".$from_email."</td>
                </tr>
                <tr>
                    <td><strong>Subject:</strong></td>
                    <td>".$subject."</td>
                </tr>
               
                <tr>
                    <td><strong>Message:</strong></td>
                    <td>".$message."</td>
                </tr>
                </table>
                </body>
                </html>
            ";
            if(mail($to_email, $subject, $message, $headers)){
                echo "OK";
            }
            else{
                echo "Error";
            }
        }
    }


?>