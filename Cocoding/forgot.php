    <?php  
        include "includes/header.php"; 

        if(!isset($_GET['forgot'])){
            header("Location: index", TRUE, 301);
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
                                        <h3 style="color:#dda39d;"><i class="fa fa-lock fa-4x"></i></h3>
                                        <h2 class="text-center">Forgot Password?</h2>
                                        <p>Enter username and registered email<br>
                                        Reset password after authentication</p>

                                        <div class="panel-body">
                                            <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input id="forgot_username_submit" name="forgot_username_submit" placeholder="Username" class="form-control"  type="text">
                                                    </div>
                                                </div>   

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                        <input id="forgot_email_submit" name="forgot_email_submit" placeholder="Email Address" class="form-control"  type="email">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <input name="recover_submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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
        </script>   

<?php include "includes/footer.php";?>

