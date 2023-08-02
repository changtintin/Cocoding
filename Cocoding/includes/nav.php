<?php
    include "function.php";
    
    
    
    
    $id = " "; 
    if(isset($_GET['p_id'])){
        $id = $_GET['p_id'];
    }    
    else{
        $id = -1;
    }

    $role = " ";    
    if(!empty($_POST['author'])){
        $role = "Visitor";
    }
    else if(isset($_SESSION['user_id'])){
        $role = "Subscriber";
    }

    /* User Like, Dislike */              
    if(isset($_POST['like_btn'])){
        $like_dis = 'like';
        user_feel($connect, $id, $like_dis);
    }
    if(isset($_POST['dislike_btn'])){
        $like_dis = 'dislike';
        user_feel($connect, $id, $like_dis);
    }         
    
    login($connect);
    add_comment($id, $role, $connect);      
    register();

    if(isset($_GET['token'])){
        $token =  $_GET['token'];
        reset_password($connect, $token);
    }
    
    /* Forgot Password */     
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recover_submit'])){        
        $email = $_POST['forgot_email_submit'];
        $username = $_POST['forgot_username_submit'];
        $len = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($len));
        $check_username = "SELECT * from ".USERS." WHERE username = '{$username}'";
        $check_result = mysqli_query($connect, $check_username);
        if(!$check_result){
            $msg = "ERROR There is something wrong";                     
            header("Location: ./forgot.php?confirm_msg={$msg}&forgot=1", TRUE, 301);
            exit();
        }
        else{
            if(mysqli_num_rows($check_result) == 0){
                $msg = "Please enter a valid Username";               
                header("Location: ./forgot.php?confirm_msg={$msg}&forgot=1", TRUE, 301);
                exit();
            }
            else{
                if(email_exists($connect)){            
                    $new_token = "UPDATE users SET token = '{$token}' where user_email = '{$email}'";
                    $token_update = mysqli_query($connect, $new_token);
                    if(!$token_update){                
                        echo "Failed";
                    }
                    include "./mail/forgot_send_mail.php";
                }
                else{
                    $msg = "Please enter a valid Email";               
                    header("Location: ./forgot.php?confirm_msg={$msg}&forgot=1", TRUE, 301);
                    exit();
                }       
                
            }
        }
    }
                
    
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">    
                <a class="navbar-brand" href="/Cocoding/index.php?lang=<?php echo $_SESSION['lang'];?>" style="font-family: Consolas,Menlo,courier new,monospace; font-weight: bold;letter-spacing: 1px;" id = "home"> 
                    <span class="glyphicon glyphicon-home"></span> <?php echo _HOME_BTN; ?>
                </a>
            </div>
            
            <!-- Nav links -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">  
                    <?php                                                   
                        if(!isset($_SESSION['username'])){
                            echo"
                                <li>                                   
                                    <a href='/Cocoding/registration.php?lang=". $_SESSION['lang']."' class = 'nav_itm' style = 'font-weight:bold; font-size: small;'>
                                        <span class='glyphicon glyphicon-triangle-right'></span> 
                            ";
                            echo _REGIST_NAV;
                            echo"
                                    </a>                                    
                                </li>
                                
                            ";
                        }
                    ?>
                    
                    <?php                                                                                               
                        if(isset($_SESSION['user_id'])){
                            
                            /* Log out */
                            echo "
                                <span class='navbar-text text-right' style = 'color:#d88383 ;'>
                                    <em>Welcome, {$_SESSION['username']}</em>
                                </span>

                                <li>
                                    
                                    <a href='/Cocoding/index.php?logout=1' style = 'font-weight:bold; font-size: small;' >
                            ";
                            echo  _LOGOUT_NAV;
                            echo"
                                    <span class='glyphicon glyphicon-log-out'></span>
                                    </a>
                                </li>
                            ";
                            if(isset($_GET['logout'])){
                                $sid = session_id();
                                logout($connect, $sid);
                            }                            
                            
                            /* Admin */
                            if($_SESSION['user_role'] == "Admin"){
                                echo "
                                    <li>
                                        <a href='/Cocoding/admin' style = 'font-weight:bold; font-size: small; color:#f2ca8f;' target='_blank' rel='noopener noreferrer'>
                                            <span class='glyphicon glyphicon glyphicon-wrench'></span> 
                                ";
                                echo _ADMIN_NAV;
                                echo"
                                        </a>
                                    </li>";
                            }
                                                        
                            /* User */
                            if(isset($_SESSION['user_id'])){
                                echo "
                                    <li>
                                        <a href='/Cocoding/user/index.php?lang=".$_SESSION['lang']."' style = 'font-weight:bold; font-size: small; color:#cdb39f;' target='_blank' rel='noopener noreferrer'>
                                            <span class='glyphicon glyphicon-user'></span> 
                                ";
                                echo _USER_NAV;
                                echo"
                                        </a>
                                    </li>";
                            }
                            
                            
                            /* Edit Post */
                            $sql = "SELECT * FROM ".POSTS." WHERE post_author = '{$_SESSION['username']}' AND  post_id = '{$id}';";
                            $r = mysqli_query($connect, $sql);
                            if($r){
                                if(mysqli_num_rows($r) == 1){
                                    echo"
                                        <li>
                                            <a href='/Cocoding/user/user_posts.php?request=user_edit_posts&edit_id=".$_GET['p_id']."' style = 'font-weight:bold; font-size: small; color:#91c2c9;'>
                                                <span class='glyphicon glyphicon-edit'></span> 
                                                Edit this Post 
                                            </a>
                                        </li>
                                    ";
                                }                                
                            }                            
                        }                        
                    ?>
                    <li>                                   
                        <a href='/Cocoding/contact.php?lang=<?php echo $_SESSION['lang']; ?>' class = 'nav_itm' style = 'font-weight:bold; font-size: small;'>
                            <?php echo _CONTACT_NAV; ?>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chat-left-text' viewBox='0 0 16 16'>
                                <path d='M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
                                <path d='M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
                            </svg>
                                
                        </a>                                    
                    </li>
                </ul>
                        
                <!-- Categories -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- Language Form -->                                   
                        <?php 
                            if(!isset($_GET['cat']) && !isset($_GET['author']) && !isset($_POST['search_submit']) && !isset($_GET['p_id'])){
                                include "./includes/lang_select.php"; 
                            }
                            else{
                                echo  "
                                    <span class='navbar-text text-right' style = 'color:#11b6df ;'>
                                        "._LANG_WELL.": ".$_SESSION['lang']."
                                    </span>
                                ";
                            }
                            
                        ?>
                    </li>
                    <li>
                        <div class="dropdown">
                            <div class=" dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="nav-drop" id = "drop">
                                    <span class="glyphicon glyphicon-triangle-right" id = "drop_icon"></span>                                    
                                    <?php 
                                        echo _CATER_WELL;
                                        if(isset($_GET['cat'])){
                                            $sql = "SELECT cat_title FROM ".CATER. " WHERE cat_id = '{$_GET['cat']}'";
                                            $q = mysqli_query($connect, $sql);
                                            if($q){
                                                if(mysqli_num_rows($q)>0){
                                                    $row = mysqli_fetch_assoc($q);
                                                    echo ": ".$row['cat_title'];
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="category">
                                <?php                                                                                               
                                    fetch_nav_cater();
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<script>
    document.getElementById("drop").onclick = function(){
        var caret = document.getElementById("drop_icon");
        var right = "glyphicon glyphicon-triangle-right";
        var bottom = "glyphicon glyphicon-triangle-bottom";
        
        if(caret.className == right){
            caret.className = bottom;
        }
        else{
            caret.className = right;
        }
    }
    
    $(document).ready(function(){
        $("#langForm").on( "change", function() {               
            $("#langForm").submit();  
        });
        var cur_lang = "<?php echo $_SESSION['lang'];?>";
        $("#home").click(function(){
            $.ajax({
                url: "/Cocoding/includes/nav.php",
                type: "get",
                dataType: "text",
                data:{
                    lang: cur_lang
                },
                
            });
        });
    });
</script>
