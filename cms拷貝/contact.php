<?php  
    include "includes/header.php"; 
   
    include "includes/nav.php"; 
?>

    <!-- Page Content -->
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//localhost%3A8888/cms/post.php?p_id=4">Share on Facebook</a>
                    <div class="col-md-8">
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
    // contact_email($connect);
    include "includes/footer.php";
?>

