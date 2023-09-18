        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <a class="navbar-brand" href="/Cocoding/user/index.php?lang=<?php echo $_SESSION['lang'];?>">
                <?php echo _USER_NAV;?>
            </a>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">               
                <li>
                    <a href = "/Cocoding/index.php?lang=<?php echo $_SESSION['lang']?>" >
                        <span class="glyphicon glyphicon-home"></span> 
                        <?php echo _HOME_BTN;?> 
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> 
                        <?php echo _WELCOME_WELL.", ".$_SESSION['username'];?> ! </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/Cocoding/user/user_profile.php?lang=<?php echo $_SESSION['lang']?>">
                                <i class="fa fa-fw fa-user"></i> 
                                <?php echo _PROFILE;?>
                            </a>
                        </li>                       
                        <li class="divider"></li>
                        <li>
                            <a href="/Cocoding/index.php?logout=1">
                                <i class="fa fa-fw fa-power-off"></i> 
                                <?php echo _LOGOUT_NAV;?>
                            </a>
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
                        <a href="index.php?lang=<?php echo $_SESSION['lang']?>"><i class="fa fa-fw fa-dashboard"></i> 
                            <?php echo _CHART_NAV; ?>
                        </a>
                    </li>
                    <li>
                        <a href="javascript;;" data-toggle="collapse" data-target="#demo1" id = "post_toggle">
                            <i class="fa fa-fw fa-arrows-v"></i> 
                                <?php echo _USER_POST; ?>                                                    
                            <i class="fa fa-fw fa-caret-right" id = "post_drop_icon"></i>
                        </a>

                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="/Cocoding/user/user_posts.php?lang=<?php echo $_SESSION['lang']?>">
                                    <?php echo _VIEW_POSTS; ?>  
                                </a>
                            </li>
                            <li>
                                <a href="/Cocoding/user/user_posts.php?request=user_add_posts&lang=<?php echo $_SESSION['lang']?>">
                                    <?php echo _ADD_POST; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript;;" data-toggle="collapse" data-target="#demo2" id = "comment_toggle">
                            <span class="glyphicon glyphicon-comment"></span>  
                                <?php echo _USER_COMM; ?>                                                    
                            <i class="fa fa-fw fa-caret-right" id = "comment_drop_icon"></i>
                        </a>

                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="/Cocoding/user/user_comments.php?lang=<?php echo $_SESSION['lang']?>">
                                    <?php echo _USER_SELF_COMM; ?>      
                                </a>
                            </li>
                            <li>
                                <a href="/Cocoding/user/user_post_comments.php?lang=<?php echo $_SESSION['lang']?>">
                                    <?php echo _USER_POST_COMM; ?>
                                </a>
                            </li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="/Cocoding/user/user_profile.php?lang=<?php echo $_SESSION['lang']?>">
                            <i class="fa fa-fw fa-user"></i>
                            <?php echo _PROFILE; ?>
                        </a>
                    </li>

                    <li>
                        <a href="/Cocoding/user/user_like.php?lang=<?php echo $_SESSION['lang']?>">
                            <span class="glyphicon glyphicon-list-alt"></span> 
                            <?php echo _LIKE_POSTS; ?>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <script>
            $(document).ready(function(){
                $("#post_toggle").click(function(){
                    var right = "fa fa-fw fa-caret-right";
                    var down = "fa fa-fw fa-caret-down";
                    $("#post_drop_icon").attr("class") == down;
                    if($("#post_drop_icon").attr("class") == right){
                        $("#post_drop_icon").attr("class",down);                        
                    }
                    else{
                        $("#post_drop_icon").attr("class", right);                        
                    }
                });


                $("#comment_toggle").click(function(){
                    var right = "fa fa-fw fa-caret-right";
                    var down = "fa fa-fw fa-caret-down";
                    $("#comment_drop_icon").attr("class") == down;
                    if($("#comment_drop_icon").attr("class") == right){
                        $("#comment_drop_icon").attr("class",down);                        
                    }
                    else{
                        $("#comment_drop_icon").attr("class", right);                        
                    }
                });
            });
        </script>

    