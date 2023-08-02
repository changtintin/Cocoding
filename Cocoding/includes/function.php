<?php
    define('CATER', "categories");
    define('POSTS', "posts");
    define('COMMENTS', "comments");
    define('USERS', "users");
    define('LIKES', "post_likes");
    define('ONLINE', "users_online");
    define('TAGS', "tags");    

    define('HOST', "162.241.24.221");
    define('USER', "vbjfjrmy_local");
    define('PASSWORD', "T#i#ntin871001");
    define('DB_NAME', "vbjfjrmy_cocoding");
    $connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
    if(!$connect){
        echo "Connection Failed";
    }
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];                               
    }
    else{
        // Default Language is English
        $_SESSION['lang'] = "en";
    }    
    include "language/{$_SESSION['lang']}.php"; 

    function login($connect){
        if(isset($_POST['login_submit'])){
            // Prevent SQL Injection
            $username =  mysqli_real_escape_string ($connect, $_POST['username_login']);
            $password_input =  $_POST['password_login'];
            $sql = "SELECT * FROM ".USERS." WHERE username = '{$username}';";
            $q = mysqli_query($connect, $sql);
    
            if($q){
                if(mysqli_num_rows($q) > 0){
                    if($row = mysqli_fetch_assoc($q)){                    
                        $password_hashed = $row['user_pass_hash'];                                                                    
                        if(password_verify($password_input, $password_hashed)){
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['user_password'] = $row['user_password'];
                            $_SESSION['user_firstname'] = $row['user_firstname'];
                            $_SESSION['user_lastname'] = $row['user_lastname'];
                            $_SESSION['user_role'] = $row['user_role'];
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['user_email'] = $row['user_email'];
                            $_SESSION['user_image'] = $row['user_image'];                            
                            $msg = "Login Successful";
                            header("Location: /Cocoding/index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", true, 301);
                            exit();
                        }
                        else{
                            $msg = "ERROR Please enter a valid Password";
                            header("Location: /Cocoding/index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", true, 301);
                            exit();
                        }
                    }
                }
                else{
                    $msg = "Something went wrong, Please try again";
                    header("Location: /Cocoding/index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", true, 301);
                    exit();
                }
            }        
        }
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
                header("Location: ./admin_cater.php?confirm_msg={$msg}", TRUE, 301);
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
                header("Location: ./admin_cater.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
            else{
                $r = "\"ok\"";

                echo "
                    <div id = 'alert_edit'>
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
            
            $del_id = esc($_GET['delete_id'], $connect);
            $sql = "DELETE FROM ". CATER . " WHERE cat_id = '{$del_id}';";
           
            $delete_cater = mysqli_query($connect, $sql);
            if(!$delete_cater){                
                echo "Error";
            }
            $msg = query_confirm($delete_cater);   
            header("Location: /Cocoding/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
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
                    <a href='/Cocoding/category.php?cat={$id}&lang={$_SESSION['lang']}' target='_blank' rel='noopener noreferrer'> 
                        {$title} 
                    </a>
                </li>";
            }
        }
    }

    function fetch_nav_cater(){
        global $connect;
        
        $c_id = -1;
        if(isset($_GET['cat'])){
            $c_id = $_GET['cat'];
        }
                        
        $q = "SELECT * FROM ". CATER;
        $select_cater_sidebar = mysqli_query($connect, $q);
        if($select_cater_sidebar){
            $i = 0;
            if(mysqli_num_rows($select_cater_sidebar) > 0){
                while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                    
                    $active = "";
                    $title = $fetch_row['cat_title'];
                    $id = $fetch_row['cat_id'];
                    if($id == $c_id){
                        $active = "class = 'active'";
                    }
                    
                    echo "<li {$active}>
                        <a href='/Cocoding/category.php?cat={$id}&lang={$_SESSION["lang"]}' style='font-family: Open Sans, sans-serif; font-size: smaller;'> {$title} </a>
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
            return "Request_Success";
        }
    }

    // STATUS COL
    // After Redirect
    function query_msg_alert(){
        if(isset($_GET['confirm_msg'])){
            $m = $_GET['confirm_msg'];
            $sim = similar_text($m, 'ERROR', $perc);
            $sim1 = similar_text($m, 'Error', $perc);
            $sim2 = similar_text($m, 'Wrong', $perc);
            $sim3 = similar_text($m, "You can't", $perc);
            $sim4 = similar_text($m, "Please", $perc);
            $sim5 = similar_text($m, '錯誤', $perc);
            $sim6 = similar_text($m, '错误', $perc);
            $r = "\"ok\"";
            if(!empty($m)){
                if($sim >= 5 ||$sim1 >= 5 ||  $sim2 >= 5 || $sim3 >= 7 || $sim4 >= 6 || $sim5 >= 5 || $sim6 >= 5){
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
    }

    function add_posts($role){
        global $connect;
        if(isset($_POST['create_post'])){
            $title = esc($_POST['title'], $connect);

            if(isset($_SESSION['username'])){
                $author = $_SESSION['username'];
                $author_id = $_SESSION['user_id'];
            }
            else{
                $author = esc($_POST['author'], $connect);
                $author_id = -1;
            }
            
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
                    header("Location: ./user_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit();  
                }  
                else{
                    $msg = ' Post Created, <a href="admin_posts.php?source=admin_add_posts"> Want to pose more? </a>';
                    $msg .= '<a href="../post.php?p_id='.$new_post_id.'"> , View your new post </a>';
                    header("Location: ../admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit();
                }                                
                
            }
            else{
                echo "Error";
            }        
        }
    }

    function delete_post_comment($table, $id_name){
        global $connect;                
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
                $sql2 = "UPDATE ".POSTS." SET  post_title = '{$title}', post_author = '{$author}',";
                $sql2 .= " post_date = '{$date}', post_image = '{$img}',";
                $sql2 .= " post_status = '{$status}', post_cater_id = '{$cater_id}', post_content = '{$post_content}'";
                $sql2 .= " WHERE post_id = '{$id}';";  
                
                $sql3 = "DELETE FROM ".TAGS. " WHERE post_id = '{$id}';";
                $query3 = mysqli_query($connect, $sql3); 
                if($query3){
                    save_tag($id, $connect);
                    $query2 = mysqli_query($connect, $sql2);                        
                    
                    if($query2){
                        $msg = 'Post Edited, <a href="/Cocoding/post/'.$id.'/"> View Post </a>';
                        header("Location: ./admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    } 
                    else{
                        die(mysqli_error($connect));
                    } 
                }
                else{
                    die(mysqli_error($connect));
                }
                
            }
        }
    }

    function user_edit_post($result_img, $id){        
        global $connect;
        if(isset($_POST['user_edit_post_submit'])){
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

            $sql3 = "DELETE FROM ".TAGS." WHERE post_id = '{$id}';";
            $query3 = mysqli_query($connect, $sql3); 

            save_tag($id, $connect);
            $query2 = mysqli_query($connect, $sql2);                        
            
            if($query2 && $query3){
                $msg = ' Post Edited, <a href="/Cocoding/post/'.$id.'/"> View Post </a>';
                header("Location: ./user_posts.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
            }   
            else{
                die(mysqli_error($connect));
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
            header("Location: ./admin_comments.php?confirm_msg={$msg}", TRUE, 301);
            exit(); 
        }
    }
    
    function edit_post_status(){
        global $connect;
        
        if(isset($_POST['postSetOption'])){
            $status = esc($_POST['postSetOption'], $connect);

            switch($status){

                case "Spam": case "Published"; case"Draft":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "UPDATE ".POSTS." SET post_status = '{$status}' WHERE post_id = {$checkbox}";
                        $q = mysqli_query($connect, $sql);
                    }
                    break;
                
                case "Delete":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "DELETE FROM ".POSTS." WHERE post_id = '{$checkbox}' ";
                        $q = mysqli_query($connect, $sql);
                    }
                     
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
                                    $post_status = $row['post_status'];
                                    $post_cater_id = $row['post_cater_id'];
                                    $post_content = $row['post_content'];
                                    $query2 = "INSERT INTO posts(post_title, post_author, post_date, post_status, post_cater_id, post_content, post_image)";
                                    $query2 .= " VALUES('{$post_title}','{$post_author}','{$post_date}','{$post_status}',{$post_cater_id},'{$post_content}','$post_image');";
                                    $result2 = mysqli_query($connect, $query2);                                    
                                }
                            }
                        }
                    }                                
                    break;
                
                case "ResetViews":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "UPDATE ".POSTS." SET post_view_count = '0' WHERE post_id = {$checkbox}";
                        $q = mysqli_query($connect, $sql);
                    }
                    break;
                    
                default: 
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

    function add_comment($p_id, $role, $connect){
        if(isset($_POST['create_comment'])){
            
            $email = esc($_POST['email'], $connect);
            $comment_content = base64_encode($_POST['comment_content']);            

            if($role == "Subscriber"){
                $author = $_SESSION['username'];
            }
            else if($role == "Visitor"){
                $author = $_POST['author'];
            }
            else{
                $msg = "ERROR Please enter author name";     
                header("Location: ./post.php?p_id{$p_id}&confirm_msg={$msg}", TRUE, 301);
                exit(); 
            }

            if(!empty($email) && !empty($comment_content)){
                $sql = "INSERT INTO ".COMMENTS."(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                $sql .= "VALUES('{$p_id}', '{$author}', '{$email}', '{$comment_content}', 'Unapproved', '".date('Y-m-d')."')";
                echo $sql."<br>";
                $q = mysqli_query($connect, $sql);            
                $msg = query_confirm($q);                
                $msg = "Comment Successful";
                header("Location: ./post.php?p_id={$p_id}&confirm_msg={$msg}", TRUE, 301);
                exit();   
            }
            else{
                $msg = "ERROR This field should not be empty";     
                header("Location: ./post.php?p_id={$p_id}&confirm_msg={$msg}", TRUE, 301);
            }
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
                header("Location: ./admin_users.php?confirm_msg={$msg}", TRUE, 301);
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
        header("Location: ./admin_users.php?confirm_msg={$msg}", TRUE, 301);
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
            header("Location: ./cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        }
    }
    
    function switch_user_role($role){
        global $connect;
        if(isset($_POST['select_ary']) && $_POST['select_ary'] != null){
            foreach($_POST['select_ary'] as $checkbox){
                $sql = "UPDATE ".USERS." SET user_role = '{$role}' WHERE user_id = '{$checkbox}'";
                $q = mysqli_query($connect, $sql);
            }
            $msg = query_confirm($q);   
        }
        else{
            $msg = "Error, Please select at least one column.";  
        }
          
        header("Location:./admin_users.php?confirm_msg={$msg}", TRUE, 301);
        exit(); 
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
            header("Location: ./user_profile.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
        }
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

    function user_name_exists($connect){
        if(isset($_POST['username'])){            
             
            if(empty($_POST['username'])){
                echo "<h6 style='color:red;'>"._NO_USR_MSG."</h6>";
            }
            else{        
                $username = $_POST['username'];  
                if(strlen($username) < 6){
                    echo "<h6 style='color:red;'>"._SHORT_USR_MSG."</h6>";
                }  
                else{
                    $sql = "SELECT * FROM ".USERS." WHERE username = '{$username}'";            
                    $q = mysqli_query($connect, $sql);
                    if($q){
                        if(mysqli_num_rows($q)>0){
                            echo "<h6 style='color:red;'>"._REPEAT_USR_MSG."</h6>";
                        }
                        else if (mysqli_num_rows($q) == 0){
                            echo "<h6 style='color:green;'>"._VALID_USR_MSG."</h6>";
                        }
                    }   
                }  
            }     
        }        
    }
    
    function email_exists($connect){
        if(isset($_POST['forgot_email_submit'])){
            $email = $_POST['forgot_email_submit'];
        }
        else if(isset($_POST['register_email'])){
            $email = $_POST['register_email'];
        }
        
        $check_mail = "SELECT * FROM ".USERS." WHERE user_email = '{$email}';";            
        $result = mysqli_query($connect, $check_mail);
        
        if($result){
            if(mysqli_num_rows($result) > 0){
                return true;
            }
            else if (mysqli_num_rows($result) == 0){
                return false;
            }
        }       
        else{
            echo "Request ERROR";
            return true;            
        }
        return true;  
    }

    function register(){
        global $connect;
        if(isset($_POST['username'])){
            
            if(email_exists($connect)){
                $msg = _USED_MAIL_MSG;
                $msg .= "<a href = '/Cocoding/index'> "._LOGIN_MSG."</a>";
                header("Location: ./registration.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
                exit();
            }

            if(empty($_POST['password']) || empty($_POST['register_email']) || empty($_POST['username'])){
                $msg = _EMPTY_COL_MSG;
                $msg .= "<a href = '/Cocoding/index'> "._LOGIN_MSG."</a>";
                header("Location: ./registration.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
                exit();
            }

            $username = esc($_POST['username'], $connect);
            $email = esc($_POST['register_email'], $connect);
            $password_input = $_POST['password'];
            
            $algo = PASSWORD_BCRYPT;
            $password_hash = password_hash($password_input, $algo);
            
            $role = "Subscriber";
            $sql = "INSERT INTO ".USERS."(username, user_email, user_pass_hash, user_role, user_password) VALUE('{$username}', '{$email}', '{$password_hash}', '{$role}', '{$password_input}')";
            $q = mysqli_query($connect, $sql);
            if($q){
                $msg = _CONGRAT_MSG;
                header("Location: ./index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
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
            $msg = "ERROR, Please login first";     
            header("Location: ./post.php?p_id{$p_id}&confirm_msg={$msg}", TRUE, 301);            
            exit(); 
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
                        echo $likes." "._LIKE_COUNT;
                    }
                    else{
                        echo $dislikes." "._DISLIKE_COUNT;
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
                                <a href="/Cocoding/post.php?p_id='.$result['post_id'].'/" class="list-group-item">'.$title.'</a>
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
            $session = session_id();
            $time = time();
            $time_out_sec = 60;
            $time_out = $time + $time_out_sec;                       
            if(!empty($session)){
                $sql = "SELECT * FROM users_online WHERE session = '{$session}'";
                $q = mysqli_query($connect, $sql);
                if(!$q){
                    die("Error").mysqli_error($connect, $q);
                }
                else{
                    if(mysqli_num_rows($q) > 0){
                        // user has been here
                        $sql2 = "UPDATE users_online SET time = '{$time}' WHERE session = '{$session}' ";
                        mysqli_query($connect, $sql2);
                    }   
                    else{
                        // new user login
                        $sql2 = "INSERT INTO users_online(session, time) VALUES('{$session}','{$time}')";
                        mysqli_query($connect, $sql2);
                    }                                                
                    
                    $sql3 = "SELECT * FROM users_online WHERE time < {$time_out}";
                    $q3 = mysqli_query($connect, $sql3);
                    $user_count = mysqli_num_rows($q3); 
                    echo $user_count;
                }
            }
            else{
                echo "No session id";
            }
        }
    }

    function comment_count($connect, $p_id){
        $sql = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = '{$p_id}' AND comment_status = 'Approved';";
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
                    echo "<a href ='/Cocoding/tag/{$row['tag_name']}' style='color:#a8a3a3;'>#".$row['tag_name']."</a> ";
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
                    $checked = "";
                    $tag_name = $row['tag_name'];
                    if(isset($_GET['edit_id'])){
                        $edit_post = $_GET['edit_id'];
                        $sql2 = "SELECT DISTINCT tag_name FROM ".TAGS." WHERE post_id = {$edit_post} AND tag_name = '{$tag_name}'";
                        $find_tags = mysqli_query($connect, $sql2);
                        if($find_tags){
                            if(mysqli_num_rows($find_tags) > 0){
                                $checked = "checked";
                            }
                        }

                    }                   
                    echo "
                        <span class='badge badge-danger' style='margin:2px;'>
                            <input type='checkbox' class='form-check-input' id ='{$tag_name}' name='select_ary[]' value = '{$tag_name}' ".$checked.">   
                            <label for='{$tag_name}' class = 'select-tag'> {$tag_name} </label>
                        </span>
                    ";
                    $i++;
                    if($i % 5 == 0 && $i > 0){
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
    
    function save_tag($post_id, $connect){
        if(isset($_POST['select_ary']) && $_POST['select_ary'] != null){
            foreach($_POST['select_ary'] as $checkbox){
                $sql2 = "INSERT INTO ".TAGS."(post_id, tag_name) VALUES('{$post_id}','{$checkbox}')";
                $q2 = mysqli_query($connect, $sql2);
                if(!$q2){
                    echo mysqli_error($connect);
                }
            }
        }
    }

    // escape the string to prevent SQL injection
    function esc($str, $connect){
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
    
    function logout($connect, $sid){
        $sql = "DELETE FROM ".ONLINE." WHERE session = '{$sid}'";
        $result = mysqli_query($connect, $sql);
        if($result){
            $lang = $_SESSION['lang'];
            session_unset();
            $_SESSION['lang'] = $lang;
            $msg = "Logout Successful";
            header("Location: ./index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
        }
        else{
            $msg = "Logout Failed";
            header("Location: ./index.php?confirm_msg={$msg}",TRUE, 301);
        }
    }

    function check_forget_pass($connect, $email, $username){
        $sql = "SELECT * FROM ".USERS." WHERE username = {$email} AND user_email = {$username}";
        $q = mysqli_query($connect, $sql);
        if($q){
            if(mysqli_num_rows($q)>0){
                return true;
            }
            return false;
        }
        return false;
    }

    // for update database all password to hashed password value
    function reset_pass_hash($connect){
        $sql = "SELECT * FROM users";
        $q = mysqli_query($connect, $sql);
        if($q){
            if(mysqli_num_rows($q)>0){
                while($row = mysqli_fetch_assoc($q)){
                    $n = $row['username'];
                    $pass = $row['user_password'];
                    $algo = PASSWORD_BCRYPT;
                    $hash = password_hash($pass, $algo);
                    $sql2 = "UPDATE users SET user_pass_hash = '{$hash}' WHERE username = '{$n}'";
                    $q2 = mysqli_query($connect, $sql2);
                }
            }
        }
    }

    function reset_password($connect, $token){
        if(isset($_POST['reset_submit'])){
            if($_POST['first_password'] == $_POST['second_password']){
                $input_password = $_POST['first_password'];
                $algo = PASSWORD_BCRYPT;
                $hashed_password = password_hash($input_password, $algo);
                // $sql = "UPDATE users SET user_password = '?' WHERE token = '?' ";
                if($stmt = mysqli_prepare($connect, "UPDATE users SET user_pass_hash = ?, user_password = ? WHERE token = ? ")){
                    mysqli_stmt_bind_param($stmt, 'sss', $hashed_password, $input_password, $token);
                    mysqli_stmt_execute($stmt);
                    if(mysqli_stmt_affected_rows($stmt)>=1){
                        $msg = "Reset Succcessful, You can log in now.";
                        header("Location: ./index.php?confirm_msg={$msg}", TRUE, 301);
                        exit();
                    }
                    else{
                        $msg = "Reset Failed";
                        header("Location: ./index.php?confirm_msg={$msg}", TRUE, 301);
                        exit();
                    }
                }  
                else{
                    echo mysqli_stmt_error($stmt);
                }                    
            }
        }
    }

    function post_show_user_feel($connect, $p_id){
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $sql = "select * from ".LIKES." WHERE user_id = '{$user_id}' AND post_id = '{$p_id}'";
            $q = mysqli_query($connect, $sql);
            if($q){
                if(mysqli_num_rows($q) > 0){
                    $row = mysqli_fetch_assoc($q);
                    $feel = $row['user_feel'];
                    if($feel == "like"){
                        $feel = _LIKE_BTN;
                    }
                    else{
                        $feel = _DISLIKE_BTN;
                    }
                    echo "<h5>"._FEEL_POST_MSG." ".$feel."</h5>";
                }
            }
        }
    }

    // NOT WORKING
    // function forgot_send_mail($connect, $token){
    //     if($_POST['recover_submit']){
    //         $to_username = $_POST['forgot_username_submit']; 
    //         $to_mail  = $_POST['forgot_email_submit'];
    //         $subject = 'Cocoding - Password Reset';
    //         $message = "
    //             <!DOCTYPE html>
    //             <html>
    //             <head>
    //             </head>
    //             <body>
    //                 <table rules='all' border='1' style='border-color: #666;' cellpadding='10'>
    //                     <tr style='background: #eee;'><td colspan='2'><strong>COCODING - Forgot Password</strong> </td></tr>
    //                     <tr>
    //                         <td><strong>To:</strong></td>
    //                         <td>".$to_username."</td>
    //                     </tr>
    //                     <tr>
    //                         <td><strong>Click to reset your password</strong></td>
    //                         <td>
    //                             <a href = 'http://localhost:80/Cocoding/reset.php?email={$to_mail}&token={$token}'>Reset your password</a>
    //                         </td>
    //                     </tr>                   
    //                 </table>
    //             </body>
    //             </html>
    //         ";   
    //         // To send HTML mail, the Content-type header must be set
    //         $headers[] = 'MIME-Version: 1.0';
    //         $headers[] = 'Content-type: text/html; charset=utf-8';

    //         // Additional headers
    //         $headers[] = "To: {$to_username}<{$to_mail}>";
    //         $headers[] = 'From: Cocoding System <cocoding@tatianachang.com>';
    //         $headers[] = 'Reply-To: Cocoding System <cocoding@tatianachang.com>';

        
            
    //         $result = mail($to_mail, $subject, $message, implode("\n", $headers));
    //         if($result){
    //             $msg = "Go check your mailbox";                            
    //         }
    //         else{
    //             $msg = "Error";                           
    //         }
    //         header("Location: ./forgot.php?confirm_msg={$msg}&forgot=1", TRUE, 301);
    //         exit();     
    //     }
       
    // }
    
    function show_part_comment($connect, $p_id){
        $query = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = {$p_id} AND comment_status = 'Approved' LIMIT 1;";
        $result = mysqli_query($connect, $query);
        if($result){                    
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $comment_author = $row['comment_author'];
                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    echo"
                        <div class='media'>
                            <a class='pull-left' href='#'>
                                <img class='media-object' src='http://placehold.it/64x64' alt='Photo'>
                            </a>
                            <div class='media-body'>
                                <h4 class='media-heading'>
                                {$comment_author}
                                    <small>{$comment_date}</small>
                                </h4>
                    ";                                        
                    show_content($comment_content);
                    echo"                                   
                            </div>
                        </div>
                    ";                
                }
                    echo '
                        <div style="padding-top: 15px">
                            <button class = "btn btn-primary" id = "more_comment" type = "submit">
                                '._COMMENT_MORE.'
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>
                        </div>
                    ';
            }
        }
    }

    function show_all_comment($connect){
        if(isset($_POST['more_comment'])){            
            $post_id = $_POST['p_id'];
            $query = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = {$post_id} AND comment_status = 'Approved';";
            $result = mysqli_query($connect, $query);
            if($result){                    
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $comment_author = $row['comment_author'];
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        echo"
                            <div class='media'>
                                <a class='pull-left' href='#'>
                                    <img class='media-object' src='http://placehold.it/64x64' alt='Photo'>
                                </a>
                                <div class='media-body'>
                                    <h4 class='media-heading'>
                                    {$comment_author}
                                        <small>{$comment_date}</small>
                                    </h4>
                        ";                                        
                        show_content($comment_content);
                        echo"                                   
                                </div>
                            </div>
                        ";             
                    }
                }
            }
        }
    }

    function user_admin_post_comment($connect){
        if(isset($_POST['post_find_comment'])){
            
           $post_title = $_POST['comment_post_title'];
           $sql2 = "
                SELECT c.* FROM(
                    (SELECT * FROM posts WHERE post_author ='{$_SESSION['username']}' AND post_title = '{$post_title}' ) AS p
                    JOIN
                    (SELECT * FROM `comments`) AS c
                    ON p.post_id = c.comment_post_id
                ) 
            ";    

            $query2 = mysqli_query($connect, $sql2);
            if(mysqli_num_rows($query2) > 0){
                echo'
                    <table class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th scope="col">'._ID.'</th>    
                                <th scope="col">'._AUTHOR_POST.'</th>                                  
                                <th scope="col">'._COMM_COUNT.'</th>                                          
                                <th scope="col">'._POST_TITLE.'</th>          
                                <th scope="col">'._STATUS.'</th>
                                <th scope="col">'._DATE.'</th>
                            </tr>
                        </thead>
                ';
                echo '<tbody>';                               
                while($row = mysqli_fetch_assoc($query2)){                    
                    $id = $row['comment_id'];
                    $p_id = $row['comment_post_id'];
                    $author = $row['comment_author'];
                    $email = $row['comment_email'];
                    $content = $row['comment_content'];
                    $status = $row['comment_status'];
                    $date = $row['comment_date'];
                    echo'    
                        <tr>
                            <th scope="row">'.$id.'</th>   
                            <td>'.$author.'</td>                                                                          
                            <td>
                    ';
                    show_content($content);
                    echo'                                                                                                                
                            </td>
                            <td>
                                <a href="/Cocoding/post.php?p_id='.$p_id.'"> 
                                '.$post_title.'
                                </a>
                            </td>
                            <td>'.$status.'</td>     
                            <td>'.$date.'</td>
                                                                 
                        </tr> 
                    ';        
                }
                echo'                                                                            
                            </tbody>                                        
                    </table>          
                ';
            }
            else{
                echo '<h3>'._NO_COMM.'</h3>';
            }                
        }
    }
    
    

    // online user amount
    users_online($connect);
    fecth_likes($connect);
    add_new_tag();

    //registration
    user_name_exists($connect);
    edit_post_status();

    show_all_comment($connect);
    user_admin_post_comment($connect);
?>