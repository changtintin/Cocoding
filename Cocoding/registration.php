    <?php  
        include "includes/header.php"; 
        include "includes/nav.php"; 
    ?>    
    
    <div class="jumbotron text-center banner_img"> 
        <div class="banner_content"> 
            <div class="banner-header"></div>                      
            <img src="/Cocoding/image/cocoding_logo-removebg.png" alt="logo" >
            <h4>Welcome to Cocoding! </h4>
            <p style="font-size: small;">
                <?php echo _REGIST_BANNER; ?>
            </p>    
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
    
        <section id="login">
            <div class="container">

                <div class = "row">
                    <div class="col-xs-6 col-xs-offset-3" style="padding-top:30px;">
                        <?php
                            query_msg_alert();
                        ?>                        
                        <!-- Registration Form -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center">
                                        <h3 style="color:#dda39d;"><i class="fa fa-lock fa-4x"></i></h3>
                                        <h2 class="text-center">
                                            <?php echo _REGISTER; ?>
                                        </h2>
                                        <div id = "read_instruction">
                                            <p style="color:#8cde93; font-size:small;">
                                                <?php 
                                                    echo _INSTRUC;
                                                ?>                                                
                                            </p>
                                            <p>
                                                 <?php 
                                                    echo _DESCRIB;
                                                ?>  
                                            </p>
                                        </div>                                        
                                        <div class="panel-body" >
                                            <form role="form" action="registration.php" method="post" id="regist-form" autocomplete="off">

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        
                                                        <input type="search" name="username" id="username" class="form-control" placeholder="<?php echo _USERNAME; ?>">    

                                                        <span class = "input-group-btn">
                                                            <button class = "btn btn-primary" type = "button" id = "username_check" data-toggle="tooltip" title="Avoid the username is registered">                                                
                                                                <span id = "icon_field">
                                                                    <span class="glyphicon glyphicon-remove-circle"  aria-hidden="true"></span> 
                                                                </span>
                                                                <?php
                                                                    echo _CHECK_BTN;
                                                                ?>                                        
                                                            </button>

                                                            <button class = "btn btn-success" type = "button" id = "refresh_username" data-toggle="tooltip" title="Reset the username" required>                                                
                                                                <span id = "icon_field">
                                                                    <span class="glyphicon glyphicon-refresh"  aria-hidden="true"></span> 
                                                                </span>
                                                                <?php
                                                                    echo _RESET_BTN;
                                                                ?>                                                
                                                            </button>
                                                        </span>                                                    
                                                    </div>
                                                </div>   
                                                <span id = "check_alert"></span>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                        <input type="email" name="register_email" id="register_email" class="form-control" placeholder="<?php echo _EMAIL; ?>" > 
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo _PASSWORD; ?>" >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                <input type="button" name="register_submit" id="register_submit" class="btn btn-custom btn-lg btn-block" value="<?php echo _SUBMIT_BTN; ?>">
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Body-->
                                </div>
                            </div>
                        </div> 
                                             
                    </div> <!-- /.col-xs-6 col-xs-offset-3 -->
                </div> <!-- /.row -->
                <div class = "row">
                    <div id = "register_field"></div> 
                    
                </div>
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

                var valid_msg = "<?php echo _VALID_USR_MSG; ?>";
                var invalid_msg = "<?php echo _CHECK_USR_MSG; ?>";
                var lang = "<?php echo $_SESSION['lang'];?>";
                
                $("#refresh_username").click(function(){
                    $("#username").attr('disabled', false);
                    $("#icon_field").html("<span class = 'glyphicon glyphicon-remove-circle'></span>");
                    $("#check_alert").text(" ");
                    $("#register_submit").attr('type', 'button');
                });

                $("#register_submit").click(function(){
                    //If the username passed the pass the check
                    if($("#username").is(":disabled")){
                        $("#username").attr('disabled', false);                    
                    }
                    else{
                        alert(invalid_msg);
                    }                    
                    $("#username").val(string(username));
                });                
                
                $("#username_check").click(function(){
                    // data: response data
                    // status: 200/404/...
                    $.post( "./includes/function.php?lang="+lang, $("#username"),function(data, status){
                        $("#check_alert").html(data);
                        console.log(status);                     
                        var okIcon = "<span class='glyphicon glyphicon-ok-circle'></span>";
                        var banIcon = "<span class='glyphicon glyphicon-ban-circle'></span>";
                        
                        if($("#check_alert").text() == valid_msg){
                            $("#icon_field").html(okIcon);
                            $("#username").attr('disabled', true);
                            $("#register_submit").attr('type', 'submit');
                        }
                        else{
                            $("#icon_field").html(banIcon);
                        }                    
                    });                    
                });

                $("#read_instruction").click(function(){                    
                    $.ajax({
                        url:'./includes/user_instruction.php',
                        type: "get",
                        dataType: "text",
                        success: function(result){                    
                            $("#register_field").html(result);
                            $("#instruction_title").get(0).scrollIntoView({behavior: 'smooth'});
                        },
                    });
                });
            });
            
            
        </script>   

<?php include "includes/footer.php";?>

