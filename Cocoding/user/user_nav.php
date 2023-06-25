        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <a class="navbar-brand" href="index">User Admin</a>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               
                <li>
                    <a href = "/Cocoding/index" ><span class="glyphicon glyphicon-home"></span> Home </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hello, <?php echo $_SESSION['username'];?> ! </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Cocoding/user/user_profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>                       
                        <li class="divider"></li>
                        <li>
                            <a href="/Cocoding/index.php?logout=1"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        <?php
                            if(isset($_GET['logout'])){
                                $sid = session_id();
                                logout($connect, $sid);
                            }
                        ?>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav" style="color:blanchedalmond;">  
                    <li>
                        <a href="javascript;;" data-toggle="collapse" data-target="#demo1">
                            <i class="fa fa-fw fa-arrows-v"></i> 
                            Posts
                            <i class="fa fa-fw fa-caret-down"></i>
                        </a>

                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="/Cocoding/user/user_posts">View All Posts</a>
                            </li>
                            <li>
                                <a href="/Cocoding/user/user_posts/user_add_posts">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/Cocoding/user/user_comments">
                            <span class="glyphicon glyphicon-comment"></span> 
                            Comments
                        </a>
                    </li>
                    
                    <li>
                        <a href="/Cocoding/user/user_profile">
                            <i class="fa fa-fw fa-user"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a href="/Cocoding/user/user_like"><span class="glyphicon glyphicon-list-alt"></span> Likes & Dislikes Posts</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>