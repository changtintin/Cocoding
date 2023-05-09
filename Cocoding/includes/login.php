<h4>Login</h4>
<div class = "form-group form-group-sm">                
    <input type = "text" class="form-control" name = "username_login" placeholder="" autocomplete="off">                    
</div>

<div class = "input-group input-group-sm">                
    <input type = "password" class="form-control" name = "password_login" placeholder="" autocomplete="off" id = "password_in">   
    <span class = "input-group-btn">
        <button class = "btn btn-success" id = "show_password" type = "button" >
            <span class ="glyphicon glyphicon-eye-close" id = "show_icon"></span>
        </button>
        <button class = "btn btn-primary" type = "submit" name = "login_submit" style="font-family: Open Sans, sans-serif;">
            Go
            <span class="glyphicon glyphicon-log-in"></span> 
        </button>
    </span> 
</div>

<div class = "col col-pt-3">  
    
</div>

<div style="padding-top: 10px;"> 
    <div class = "form-group text-right">  
        <a href="./registration.php" style="font-size: small;">Create an account</a>
    </div>
</div>
<script>
        var show = document.getElementById("password_in");
        var icon = document.getElementById("show_icon");
        document.getElementById("show_password").onclick= function(){
            if(show.type == "text"){
                show.type="password";
                icon.className="glyphicon glyphicon-eye-close";
                
            }
            else{
                show.type="text";
                icon.className="glyphicon glyphicon-eye-open";
            }
            
        }

</script>
<?php 
    
    if(isset($_POST['login_submit'])){

        // Prevent SQL Injection
        $username =  mysqli_real_escape_string ($connect, $_POST['username_login']);
        $password_input =  mysqli_real_escape_string ($connect, $_POST['password_login']);
        $sql = "SELECT * FROM ".USERS." WHERE username = '{$username}';";
        $q = mysqli_query($connect, $sql);

        if($q){
            if(mysqli_num_rows($q) > 0){
                if($row = mysqli_fetch_assoc($q)){                    
                    $algo = PASSWORD_BCRYPT;
                    $hash = password_hash($password_input, $algo);
                    $password = $row['user_password'];
                    if(password_verify($password, $hash)){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['user_password'] = $row['user_password'];
                        $_SESSION['user_firstname'] = $row['user_firstname'];
                        $_SESSION['user_lastname'] = $row['user_lastname'];
                        $_SESSION['user_role'] = $row['user_role'];
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_email'] = $row['user_email'];
                        $_SESSION['user_image'] = $row['user_image'];
                        
                        $msg = "Welcome back here";
                        header("Location: ./index.php?confirm_msg={$msg}", true, 301);
                    }
                    else{
                        $msg = "Wrong Password";
                        header("Location: ./index.php?confirm_msg={$msg}", true, 301);
                    }
                }
            }
            else{
                $msg = "Wrong Username";
                header("Location: ./index.php?confirm_msg={$msg}", true, 301);
            }
        }        
    }
?>
