        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="index.php">Admin Page</a>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
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
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav" style="color:blanchedalmond;">

                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                   
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1">
                            <i class="fa fa-fw fa-arrows-v"></i> 
                            Posts
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>

                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="./admin_posts.php">View All Posts</a>
                            </li>
                            <li>
                                <a href="./admin_posts.php?source=admin_add_posts">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                            <span class="glyphicon glyphicon-comment"></span> 
                             Comments
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>

                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="./admin_comments.php">View All Comments</a>
                            </li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                            <span class="glyphicon glyphicon-user"></span>
                            Users
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>

                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="./admin_users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="admin_users.php?source=admin_add_users">Add Users</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="./admin_cater.php"><span class="glyphicon glyphicon-list-alt"></span>  Catergories</a>
                    </li>
  
                    <li>
                        <a href="./admin_profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>