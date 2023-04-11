
<?php
    
    function insert_cater(){
        global $connect;
        // Add Catergory
        if(isset($_POST['new_cater_submit'])){
            $new_cater_add = $_POST['new_cater_add'];
            if($new_cater_add != null){
                $sql = "INSERT INTO ". CATER_TABLE ." (cat_title) VALUES ('{$new_cater_add}');";
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
            $edit_cater_name = $_GET['edit_cater_name'];
            $edit_cater_submit = $_GET['edit_cater_submit'];

            if($edit_cater_name != null){
                $sql = "UPDATE ". CATER_TABLE ." SET cat_title = '{$edit_cater_name}' WHERE cat_title = '{$edit_cater_submit}';";
                $query = mysqli_query($connect, $sql);
                if(!$query){
                    die("Error".mysqli_error($connect));
                }
                
                $msg = query_confirm($query);   
                header("Location: http://localhost:8888/cms/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
            else{
                echo "<div id = 'alert_edit'>
                        <div class='alert' >
                            <span class='closebtn' onclick='close_alert_edit()'>&times;</span>
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
            $del_id = $_GET['delete_id'];
            $sql = "DELETE FROM ". CATER_TABLE . " WHERE cat_id = '{$del_id}';";
            echo $sql;
            $delete_cater = mysqli_query($connect, $sql);
            if($delete_cater){
                echo "ok";
            }
            else{
                echo "Error";
            }

            $msg = query_confirm($delete_cater);   
            header("Location: http://localhost:8888/cms/admin/admin_cater.php?confirm_msg={$msg}", TRUE, 301);
            exit();
        }  
    }

    function fetch_all_cater(){
        global $connect;

        $q = "SELECT * FROM ". CATER_TABLE;
        $select_cater_sidebar = mysqli_query($connect, $q);
        if($select_cater_sidebar){
            while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                $title = $fetch_row['cat_title'];
                $id = $fetch_row['cat_id'];
                echo "<li>
                    <a href='category.php?cat={$id}' > 
                        {$title} 
                    </a>
                </li>";
            }
        }
    }

    function fetch_partof_cater(){
        global $connect;

        $q = "SELECT * FROM ". CATER_TABLE;
        $select_cater_sidebar = mysqli_query($connect, $q);
        if($select_cater_sidebar){
            $i = 0;
            if(mysqli_num_rows($select_cater_sidebar) > 0){
                while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                    if($i > 5)
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

            if($sim >= 5 ||  $sim2 >= 5 || $sim3 >= 7){
                $m = "<span class='glyphicon glyphicon-remove'></span>  ".$m;
            }
            else{
                $m = "<span class='glyphicon glyphicon-ok'></span>  ".$m;
            }

            echo "
                <div id = 'alert_edit'>
                    <div class='alert' >
                        <span class='closebtn' onclick='close_alert_edit()'>&times;</span>".$m
                        ."
                    </div> 
                </div>
            ";
            
        }
    }

    function add_posts(){
        global $connect;

        if(isset($_POST['create_post'])){
            $title = $_POST['title'];
            $author = $_POST['author'];
            $status = $_POST['status'];
            $img = $_FILES['img']['name'];
            $img_tmp = $_FILES['img']['tmp_name'];
            $tag = $_POST['tag'];
            $comment = 0;
            $date = $_POST['date'];
            $cater_id = $_POST['cater_id'];
            $post_content = $_POST['post_content'];
            $post_content = base64_encode($post_content);

            move_uploaded_file($img_tmp,"../image/$img");
    
            $sql = "INSERT INTO posts(post_title, post_author, post_date, post_image, post_tags, post_comment_count, post_status, post_cater_id, post_content)";
            $sql .= " VALUES('{$title}','{$author}','{$date}','{$img}','{$tag}',{$comment},'{$status}',{$cater_id},'{$post_content}');";
            echo $sql;
            $query = mysqli_query($connect, $sql);
            if($query){
                // fetch the last created id
                $new_post_id = mysqli_insert_id($connect);
                $msg = ' Post Created, <a href="admin_posts.php?source=admin_add_posts"> Want to pose more? </a>';
                $msg .= '<a href="../post.php?p_id='.$new_post_id.'"> , View your new post </a>';
                header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                exit();  
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
            $title = $_POST['title'];
            $author = $_POST['author'];
            $status = $_POST['status'];
            $tag = $_POST['tag'];
            $comment = $_POST['comment'];
            $date = $_POST['date'];

            $post_content = $_POST['post_content'];
            $post_content = base64_encode($post_content);

            $cater_n = $_POST['cater_n'];
            $img = $_FILES['img']['name'];                        
            $img_tmp = $_FILES['img']['tmp_name'];
            move_uploaded_file($img_tmp,"../image/$img");

            if(empty($img)){
                $img = $result_img;
            }

            $sql = "SELECT cat_id FROM ".CATER_TABLE." WHERE cat_title = '{$cater_n}'";
            $q = mysqli_query($connect, $sql);
            if(mysqli_num_rows($q) > 0){
                $result =  mysqli_fetch_assoc($q);
                $cater_id = $result['cat_id'];
            }

            $sql2 = "UPDATE ".POSTS_TABLE." SET  post_title = '{$title}', post_author = '{$author}',";
            $sql2 .= " post_date = '{$date}', post_image = '{$img}', post_tags = '{$tag}', post_comment_count = {$comment},";
            $sql2 .= " post_status = '{$status}', post_cater_id = '{$cater_id}', post_content = '{$post_content}'";
            $sql2 .= " WHERE post_id = '{$id}';";
           
            $query2 = mysqli_query($connect, $sql2);                        
            
            if($query2){
                $msg = ' Post Edited, <a href="../post.php?p_id='.$id.'"> View Post </a>';
                header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);

            }
               
        }
    }

    

    function approve_comments($status){
        global $connect;
        
        if($_POST['comment_setting'] == 'Approved'||$_POST['comment_setting'] == 'Unapproved'){
            foreach($_POST['select_ary'] as $checkbox){
                $sql = "UPDATE ".COMMENTS_TABLE." SET comment_status = '{$status}' WHERE comment_id = {$checkbox}";
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
            $status = $_POST['post_setting'];

            switch($status){
                case "Spam":case "Published";case"Draft":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "UPDATE ".POSTS_TABLE." SET post_status = '{$status}' WHERE post_id = {$checkbox}";
                        $q = mysqli_query($connect, $sql);
                    }
            
                    $msg = query_confirm($q);     
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
                
                case "Delete":
                    foreach($_POST['select_ary'] as $checkbox){
                        $sql = "DELETE FROM ".POSTS_TABLE." WHERE post_id = '{$checkbox}' ";
                        $q = mysqli_query($connect, $sql);
                    }
                    $msg = query_confirm($q);     
                    
                    header("Location: http://localhost:8888/cms/admin/admin_posts.php?confirm_msg={$msg}", TRUE, 301);
                    exit(); 
                    break;
                
                case "Duplicate":
                    foreach($_POST['select_ary'] as $checkbox){
                        $query1 = "SELECT * FROM ".POSTS_TABLE." WHERE post_id = '{$checkbox}';";
                        $result1 = mysqli_query($connect, $query1);
                        if($result1){
                            if(mysqli_num_rows($result1) > 0){
                                if($row = mysqli_fetch_assoc($result1)){
                                   
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_status = $row['post_status'];
                                    $post_cater_id = $row['post_cater_id'];
                                    $post_content = $row['post_content'];

                                    $query2 = "INSERT INTO posts(post_title, post_author, post_date, post_tags, post_comment_count, post_status, post_cater_id, post_content, post_image)";
                                    $query2 .= " VALUES('{$post_title}','{$post_author}','{$post_date}','{$post_tags}',{$post_comment_count},'{$post_status}',{$post_cater_id},'{$post_content}','$post_image');";
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
                        $sql = "UPDATE ".POSTS_TABLE." SET post_view_count = '0' WHERE post_id = {$checkbox}";
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
            $sql = "SELECT * FROM ".POSTS_TABLE." WHERE post_id = '{$p_id}'";            
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

    function increase_comment_count($p_id){
        global $connect;
        $sql = "UPDATE ".POSTS_TABLE." SET post_comment_count = post_comment_count + 1 WHERE post_id = ".$p_id;
        
        $q = mysqli_query($connect, $sql);
        if(!$q){
            echo query_confirm($q);
        }
    }

    function decrease_comment_count($comment_id){
        global $connect;
        $p_id = -1;
        $sql1= "SELECT * FROM ".COMMENTS_TABLE." WHERE comment_id = {$comment_id}";
        $q1 = mysqli_query($connect, $sql1);
        if($q1){
            if(mysqli_num_rows($q1) > 0){
                $row = mysqli_fetch_assoc($q1);
                $p_id = $row['comment_post_id'];
            
                $sql2 = "UPDATE ".POSTS_TABLE." SET post_comment_count = post_comment_count - 1 WHERE post_id = {$p_id}";
                
                $q2 = mysqli_query($connect, $sql2);
                if(!$q2){
                    echo query_confirm($q2);
                }
            }
        }
    }

    function add_comment($p_id){
        global $connect;
        if(isset($_POST['create_comment'])){
            $author = $_POST['author'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            if(!empty($author)&&!empty($email)&&!empty($comment_content)){
                $sql = "INSERT INTO ".COMMENTS_TABLE."(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                $sql .= "VALUE('{$p_id}', '{$author}', '{$email}', '{$comment_content}', 'Unapproved', now())";
                $q = mysqli_query($connect, $sql);
                $msg = query_confirm($q);
                increase_comment_count($p_id);
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
            $first_n = $_POST['first_n'];
            $last_n = $_POST['last_n'];
            $username = $_POST['username'];
            

            if(!empty($first_n) && !empty($last_n) && !empty($username)){
                $user_role = $_POST['role'];
                $user_email= $_POST['email'];
                $user_password = $_POST['password'];


                $sql = "INSERT INTO ".USERS_TABLE."(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
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
            $sql = "DELETE FROM ".USERS_TABLE." WHERE user_id = '{$checkbox}'";
            $q = mysqli_query($connect, $sql);
        }
        $msg = query_confirm($q);     
        header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        exit(); 
        
    }

    function edit_users($user_id){        
        global $connect;
        if(isset($_POST['edit_user'])){
            $first_n = $_POST['first_n'];
            $last_n = $_POST['last_n'];
            $username = $_POST['username'];
            $user_role = $_POST['role'];
            $user_email= $_POST['email'];
            $user_password = $_POST['password'];

            $salt = "$2a$07$"."Sphinxofblackfoxelephjflks$";
            $en_password = crypt($user_password, $salt);

            $sql2 = "UPDATE ".USERS_TABLE." SET  user_firstname = '{$first_n}', user_lastname = '{$last_n}',";
            $sql2 .= " user_role = '{$user_role}', user_email = '{$user_email}', user_password = '{$user_password}', username = '{$username}', user_randSalt = '{$en_password}'";
            $sql2 .= " WHERE user_id = '{$user_id}';";
            $query2 = mysqli_query($connect, $sql2);                        
            
            $msg = query_confirm($query2);     
            header("Location: http://localhost:8888/cms/admin/admin_users.php?confirm_msg={$msg}", TRUE, 301);
        }
    }

    function switch_user_role($role){
        global $connect;

        foreach($_POST['select_ary'] as $checkbox){
            $sql = "UPDATE ".USERS_TABLE." SET user_role = '{$role}' WHERE user_id = '{$checkbox}'";
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
    
            $sql = "INSERT INTO ".USERS_TABLE."(username, user_email, user_password, user_role, user_randSalt) VALUE('{$username}', '{$email}', '{$password}', '{$role}', '{$en_password}')";
            $q = mysqli_query($connect, $sql);
            if($q){
                $msg = "Congrats! You are our subscriber from now on.";
                header("Location: index.php?confirm_msg={$msg}", TRUE, 301);
                exit();
            }
        }
    }

    function increase_view_count($connect, $p_id){
        $sql = "UPDATE ".POSTS_TABLE." SET post_view_count = post_view_count + 1 WHERE post_id = ".$p_id;
        $q = mysqli_query($connect, $sql);
        if(!$q){
            die("Error").mysqli_error($connect, $q);
        }
    }

    function like_dis($connect, $p_id, $like){
        
        if(isset($_SESSION['user_role'])){
            $sql2 = "SELECT * FROM ".LIKES_TABLE." WHERE user_id = ".$_SESSION['user_id']." AND post_id = ".$p_id;
            
            $q2 = mysqli_query($connect, $sql2);
            if($q2){
                if(mysqli_num_rows($q2) > 0){

                    // EXIST
                    $row = mysqli_fetch_assoc($q2);

                    // If the like_dis is not the same, means change the like
                    if($row['like_dis'] != $like){
                        $sql4 = "UPDATE ". LIKES_TABLE ." SET like_dis = '{$like}' WHERE user_id = '{$_SESSION['user_id']}' AND post_id = '{$p_id}';";
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
                        $sql6 = "UPDATE " . POSTS_TABLE . $condition . " WHERE post_id = " . $p_id;
                        
                        $q6 = mysqli_query($connect, $sql6);
                        if(!$q6){
                            die("Error").mysqli_error($connect, $q6);
                        }
                        else{
                            echo "<script> alert('You don't like the post... ')</script>" ;
                         }
                    }

                }
                else{
                    // NOT EXIST
                    $sql3 = "INSERT INTO ". LIKES_TABLE ."(user_id, post_id, like_dis) VALUES('{$_SESSION['user_id']}', '{$p_id}', '{$like}');";
                    echo $sql3;
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

                    $sql5 = "UPDATE ". POSTS_TABLE .$condition." WHERE post_id = " . $p_id;
                    
                    $q5 = mysqli_query($connect, $sql5);
                    if(!$q5){
                        die("Error").mysqli_error($connect, $q3);
                    }
                    else{
                       echo "<script> alert('You liked the post ')</script>" ;
                    }

                }
            }
            
        }
        else{
            echo "Plz login !!!!!";
        }
    }
?>