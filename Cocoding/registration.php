    <?php  
        include "includes/header.php"; 
        include "includes/nav.php"; 
    ?>
    <div class="jumbotron text-center banner_img"> 
        <div class="banner_content"> 
            <div class="banner-header"></div>          
            
            <img src="image/cocoding_logo-removebg.png" alt="logo" >
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
                        <div class="form-wrap">
                            <h1 style="color:#756961; padding-bottom:20px;">Register</h1>
                            
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="username" class="sr-only">username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>
                        
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Go">
                            </form>
                        
                        </div>
                    

                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


        <hr>

<?php include "includes/footer.php";?>

