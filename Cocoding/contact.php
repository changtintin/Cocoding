<?php  
    include "includes/header.php"; 
    include "includes/nav.php"; 
?>
    <div class="jumbotron text-center banner_img"> 
        <div class="banner_content"> 
            <div class="banner-header"></div>          
            
            <img src="image/cocoding_logo-removebg.png" alt="logo" >
            <h4>Contact Us anytime </h4>
            <p style="font-size: small;">
               Got a coding problem you can't solve?<br> 
               Send it to us through our easy-to-use form <br>
               and our team will work on a solution. <br>
               Don't forget to leave your email so we can send you a reply!<br> 
               We're here to help you with all your coding needs, <br>
               so send in your questions and let's find a solution together<br>
            </p>
    
        </div>
    </div>
    <!-- Page Content -->
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php query_msg_alert(); ?>
                        <h1 style="color:#756961; padding-bottom:20px; text-align:center;">Contact Us</h1>

                        <div class="form-wrap">
                            <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group row">  
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>                                  
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your name">                                
                                    </div>
                                </div>

                                <div class="form-group row">  
                                    <label for="name" class="col-sm-2 col-form-label">Your mail</label>                                  
                                    <div class="col-sm-10">
                                        <input type="email" name="mail" id="mail" class="form-control" placeholder="We will reply to this mailbox">                                
                                    </div>
                                </div>
                                
                                <div class="form-group row">         
                                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>                           
                                    <div class="col-sm-10">
                                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Describe Your Problem">
                                
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="summernote" class="col-sm-2 col-form-label">Message</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="40" name="content"  id="summernote"></textarea>
                                    </div>
                                </div>
                        
                                <input type="submit" name="contact_submit" id="contact_submit" class="btn btn-custom btn-lg btn-block" value="Send">
                            </form>
                        
                        </div>
                    </div> <!-- /.col-xs-12 -->

                    <?php include "includes/sidebar.php"; ?>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>

<?php 
    contact_email($connect);
    include "includes/footer.php";
?>

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
