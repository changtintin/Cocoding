    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <form action="./search.php" method="post">
                <div class = "input-group">                
                    <input type = "text" class="form-control" name = "search_input" placeholder="keywords, author, topic......">                    
                    <span class = "input-group-btn">
                        <button class = "btn btn-primary" type = "submit" name = "search_submit">
                            <span class = "glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>

        <!-- Login Well -->
        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="post">
                <div class = "form-group">                
                    <input type = "text" class="form-control" name = "username" placeholder="Username">                    
                </div>

                <div class = "input-group">                
                    <input type = "password" class="form-control" name = "password" placeholder="Password">                                               
                    <span class = "input-group-btn">
                        <button class = "btn btn-primary" type = "submit" name = "login_submit" style="font-family: 'Open Sans', sans-serif;">
                            Go
                            <span class="glyphicon glyphicon-log-in"></span> 
                        </button>
                    </span> 
                    
                </div>
                <div style="padding-top: 10px;"> 
                    <div class = "form-group text-right">  
                        <a href="./registration.php" style="font-size: small;">Create an account</a>
                    </div>
                </div>
                
            </form>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>All Categories</h4>
            <div class="row">
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
                            fetch_all_cater();                            
                        ?>
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <?php
            if($_SESSION['user_id']){

        ?>    
        <div class="well">
            <h4>Like Posts</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <ol class="list-group" style='font-size: 10px; font-family: Helvetica, Arial, sans-serif; font-weight:300; '>
                <?php fetch_like_posts($connect, $_SESSION['user_id']); ?>
                <a href="#" class="list-group-item">These Boots Are Made For Walking</a>
                <a href="#" class="list-group-item ">Eleanor, Put Your Boots On</a>
                <a href="#" class="list-group-item">Puss 'n' Boots</a>
                <a href="#" class="list-group-item">Die With Your Boots On</a>
                <a href="#" class="list-group-item">Fairies Wear Boots</a>
            </ol>
        </div>
        <?php
            }
        
        ?>
        <!-- Side Widget Well -->
        <div class="well">
            <h4>Campaign</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

            <ol class='list-group' style='font-size: 10px; font-family: Helvetica, Arial, sans-serif; font-weight:300; '>
                <li class='list-group-item'>
                    <a href="#">
                        Vote for 2022 American Influencer Awards   
                    </a>     
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        McDonald / BurgerKing: 2023 Free Coupons
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Learn best practices from experienced developers
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        The rise of the K-drama heroine
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Inside China's crackdown on tattoo culture   
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Be the first to know the new products and features
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Start with $200 Azure credit
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Build in the cloud with an Azure free account
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        Complete List of All Bootstrap Classes
                    </a>
                </li>
                <li class='list-group-item'>
                    <a href="#">
                        W3.CSS is Smaller, Faster and Easier to Use.
                    </a>
                </li>

            </ol>
        </div>

    </div>
</div>