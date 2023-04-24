        <?php
            // $user_count = users_online_count($connect);
        ?>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <a class="navbar-brand" href="index.php">User Admin</a>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <!-- <li>
                    <a href = "#" > USERS ONLINE: <?php echo $user_count; ?> </a>
                </li> -->
                <?php
                   
                ?>
                <li>
                    <a href = "../index.php" ><span class="glyphicon glyphicon-home"></span> Home </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hello, <?php echo $_SESSION['username'];?> ! </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./admin_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>                       
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="nav">
                
                  
                <ul class="nav navbar-nav side-nav" style="color:blanchedalmond;">  
                                  
                    <li>
                        <a href="user_posts.php">
                            <i class="fa fa-fw fa-arrows-v"></i> 
                            Posts                   
                        </a>                         
                    </li>
                   
                    <li>
                        <a href="user_comments.php">
                            <span class="glyphicon glyphicon-comment"></span> 
                            Comments
                        </a>
                    </li>
                    
                    <li>
                        <a href="user_profile.php">
                            <i class="fa fa-fw fa-user"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a href="user_like.php"><span class="glyphicon glyphicon-list-alt"></span> Likes & Dislikes Posts</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>