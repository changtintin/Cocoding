<?php  
    include "includes/header.php";   
    if(!isset($_GET['email']) || !isset($_GET['token'])){
        $msg = "You have no access to visit the page.";
        header("Location: ./index.php?confirm_msg={$msg}&lang={$_SESSION['lang']}", TRUE, 301);
        exit();
    }     
    include "includes/nav.php";    
?>
    
    <div class="jumbotron text-center banner_img"> 
        <div class="banner_content"> 
            <div class="banner-header"></div>          
            <img src="/Cocoding/image/cocoding_logo-removebg.png" alt="logo">
            <h4>Welcome to CoCoding! </h4>
            <p style="font-size: small;">
                Share your coding knowledge with a community <br> 
                of like-minded individuals and collaborate on projects together.<br>
                Join now and start learning, teaching,<br> 
                and growing with others who are passionate about coding.<br>
                Let's build something great together!"<br>
            </p>    
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3"  style="padding-top:30px;">
                        <?php
                            
                            query_msg_alert();
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">                                    
                                    <h2 class="text-center">Reset Password</h2>       
                                    <p>Reset password after authentication</p>                            
                                    <div class="panel-body">
                                        <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                                    <input id = "first_password" name = "first_password" placeholder="New Password" class="form-control"  type="password">
                                                </div>                                                
                                            </div>
                                            <div class="form-group">   
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-ok color-blue"></i></span>
                                                    <input id = "second_password" name = "second_password" placeholder="Enter new password again" class="form-control"  type="password" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span style="color:#c65353" id = "check_same_msg">
                                                        <h5>
                                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                                            Passwords are not the same       
                                                        </h5>                                                                                                         
                                                    </span>
                                                    <span style="color:#6795d0" id = "check_len_msg">
                                                        <h5>
                                                            <i class="glyphicon glyphicon-remove-circle"></i>
                                                            Password length should > 5  
                                                        </h5>                                                                                                         
                                                    </span>
                                                </div>                                             
                                            </div>                                            
                                            <div class="form-group">
                                                <button name="reset_submit" id = "reset_submit" name = "reset_submit" class="btn btn-lg btn-primary btn-block" type="submit" disabled="disabled" data-toggle="tooltip" title="Reset the username">
                                                Go
                                                </button>
                                            </div>

                                            <input type="hidden" class="hide" name="token" id="token" value="">
                                        </form>

                                    </div><!-- Body-->
                                </div>
                            </div>
                        </div>                  
                    </div> <!-- /.col-xs-6 col-xs-offset-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
       
        
        <script>
                              
            function close_alert_edit(field_name) {
                switch(field_name){
                    case "ad":
                        document.getElementById("ad_window").innerHTML = " ";
                    break;

                    case "social":
                        document.getElementById("social_window").innerHTML = " ";
                    break;

                    case "notice":
                        document.getElementById("notice_window").innerHTML = " ";
                    break;

                    default:
                        document.getElementById("alert_edit").innerHTML = " ";
                    break;
                }
            }   

            function check_password(){
                var first = document.getElementById("first_password").value;
                var second = document.getElementById("second_password").value;
                var reset_submit = document.getElementById("reset_submit");
                
                if(first && second && first == second){
                    document.getElementById("check_same_msg").innerHTML = "<h5><i class='glyphicon glyphicon-ok-circle'></i>The same</h5>";
                    if(first.length>5){    
                        document.getElementById("check_len_msg").innerHTML = "<h5><i class='glyphicon glyphicon-remove-circle'></i>Password already have more than 5 characters!</h5>";                    
                        reset_submit.disabled = false;
                    }
                    else{
                        document.getElementById("check_len_msg").innerHTML = "<h5><i class='glyphicon glyphicon-remove-circle'></i>Password must have more than 5 characters!</h5>";
                        reset_submit.disabled = true;
                    }                    
                }
                else{                    
                    reset_submit.disabled = true;
                }
            }
            setInterval(check_password, 1000);
        </script>   
       
<?php include "includes/footer.php";?>

