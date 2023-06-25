    <?php  
        include "includes/header.php"; 
        include "includes/nav.php"; 
    ?>
    
    <div class="jumbotron text-center banner_img"> 
        <div class="banner_content"> 
            <div class="banner-header"></div>          
            
            <img src="/Cocoding/image/cocoding_logo-removebg.png" alt="logo" >
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
    
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <?php
                            query_msg_alert();
                        ?>
                        <div class="form-wrap">
                            <h1 style="color:#756961; padding-bottom:20px;">Sign Up</h1>
                            
                            <form role="form" action="registration.php" method="post" id="regist-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="Username" class="form-label">Username</label>
                                    <div class="input-group">                                        
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">    

                                        <span class = "input-group-btn">

                                            <button class = "btn btn-primary" type = "button" id = "username_check" data-toggle="tooltip" title="Check for username">                                                
                                                <span class="glyphicon glyphicon-remove-circle"></span>                                                
                                            </button>

                                            <button class = "btn" type = "button" id = "refresh_username" data-toggle="tooltip" title="Reset the username" required>                                                
                                                <span class="glyphicon glyphicon-refresh"></span>                                                
                                            </button>
                                        </span>
                                    </div>                                                                            
                                    <span id = "check_alert"></span>
                                </div>

                                <!-- Email Input -->
                                <div class="form-group">                                    
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="register_email" id="register_email" class="form-control" placeholder="somebody@example.com" >                                                                    
                                    
                                </div>

                                <!-- Password Input -->
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                </div>
                               
                                <!-- Submit Button -->
                                <input type="button" name="register_submit" id="register_submit" class="btn btn-custom btn-lg btn-block" value="Go">
                            </form>
                        
                        </div>                    
                    </div> <!-- /.col-xs-6 col-xs-offset-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>
        
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
            
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();

                $("#refresh_username").click(function(){
                    $("#username").attr('disabled', false);
                    $("#username_check").html("<span class = 'glyphicon glyphicon-remove-circle'></span>");
                    $("#check_alert").text(" ");
                    $("#register_submit").attr('type', 'button');
                });

                $("#register_submit").click(function(){
                    $("#username").attr('disabled', false);
                    $("#username").val(string(username));
                });

                $("#username_check").click(function(){
                    // data: response data
                    // status: 200/404/...
                    $.post( "./includes/function.php", $("#username"),function(data, status){
                        $("#check_alert").html(data);
                        console.log(status);                     
                        var okIcon = "<span class='glyphicon glyphicon-ok-circle'></span>";
                        var banIcon = "<span class='glyphicon glyphicon-ban-circle'></span>";

                        if($("#check_alert").text() == "You can use this username"){
                            $("#username_check").html(okIcon);
                            $("#username").attr('disabled', true);
                            $("#register_submit").attr('type', 'submit');
                        }
                        else{
                            $("#username_check").html(banIcon);
                        }                    
                    });
                });
            });
            
        </script>   

<?php include "includes/footer.php";?>

