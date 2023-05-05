<?php
    if(!headers_sent()){
        session_start();
    }
    include "function.php";
    
    
    if(isset($_GET['p_id'])){
        if(isset($_SESSION['user_id'])){
            $role = "Member";
        }
        else{
            $role = "Visitor";
        }
        add_comment($_GET['p_id'], $role);
    }
    register();
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">    
                <a class="navbar-brand" href="index.php" style="font-family: Consolas,Menlo,courier new,monospace; font-weight: bold;letter-spacing: 1px;"> 
                    <span class="glyphicon glyphicon-home"></span>   HOME
                </a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                <ul class="nav navbar-nav">  
                    <?php   
                        
                        
                        if(!isset($_SESSION['username'])){
                            echo"
                                <li>
                                   
                                    <a href='./registration.php' class = 'nav_itm' style = 'font-weight:bold; font-size: small;'>
                                        <span class='glyphicon glyphicon-triangle-right'></span> 
                                        Sign up 
                                    </a>
                                    
                                </li>
                            ";
                        }
                    ?>
                    
                    <?php                                                                                               
                        if(isset($_SESSION['user_id'])){
                            echo "
                                <span class='navbar-text text-right' style = 'color:#d88383 ;'>
                                    <em>Welcome, {$_SESSION['username']}</em>
                                </span>

                                <li>
                                    <a href='./includes/logout.php' style = 'font-weight:bold; font-size: small;'>
                                        Logout 
                                        <span class='glyphicon glyphicon-log-out'></span>
                                    </a>
                                </li>
                            ";
                            
                            if($_SESSION['user_role'] == "Admin"){
                                echo "
                                    <li>
                                        <a href='./admin/index.php' style = 'font-weight:bold; font-size: small; color:#f2ca8f;' target='_blank' rel='noopener noreferrer'>
                                            <span class='glyphicon glyphicon glyphicon-wrench'></span> 
                                            Admin 
                                        </a>
                                    </li>";
                            }
                            
                            if(isset($_SESSION['user_id'])){
                                echo "
                                    <li>
                                        <a href='./user/index.php' style = 'font-weight:bold; font-size: small; color:#cdb39f;' target='_blank' rel='noopener noreferrer'>
                                            <span class='glyphicon glyphicon-user'></span> 
                                            User
                                        </a>
                                    </li>";
                            }

                            if(isset($_GET['p_id'])){
                                echo"
                                    <li>
                                        <a href='./user/user_posts.php?request=user_edit_posts&edit_id=".$_GET['p_id']."' style = 'font-weight:bold; font-size: small; color:#91c2c9;'>
                                            <span class='glyphicon glyphicon-edit'></span> 
                                            Edit this Post 
                                        </a>
                                    </li>
                                ";
                            }
                        }
                        fetch_partof_cater();
                    ?>
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    