
<?php
    include "admin_includes/admin_header.php";
?>
<body >
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            include "admin_includes/admin_nav.php"; 
        ?>

        <div id="page-wrapper">
            <script>
                function close_alert_edit(){
                    document.getElementById("alert_edit").innerHTML=" ";
                }
            </script>

            <?php 
                query_msg_alert(); 

                $user_count = fetch_row_count(USERS_TABLE,'');
                $post_count = fetch_row_count(POSTS_TABLE,'');
                $comment_count = fetch_row_count(COMMENTS_TABLE,'');
                $cater_count = fetch_row_count(CATER_TABLE,'');

                $published_post_count = fetch_row_count(POSTS_TABLE," WHERE post_status='Published'");

                $draft_post_count = fetch_row_count(POSTS_TABLE," WHERE post_status='Draft'");

                $approved_comment_count = fetch_row_count(COMMENTS_TABLE," WHERE comment_status='Approved'");
                $unapproved_comment_count = fetch_row_count(COMMENTS_TABLE," WHERE comment_status='Unapproved'");

                $admin_count = fetch_row_count(USERS_TABLE," WHERE user_role='Admin'");
                $subscriber_count = fetch_row_count(USERS_TABLE," WHERE user_role='Subscriber'");
            ?>    

            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to <?php echo $_SESSION['username']."'s";?> Admin <small>
                                <?php 
                                    echo $_SESSION['user_firstname']." ";
                                    echo $_SESSION['user_lastname'];
                                ?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                       
                <!-- /.row -->
                <div class="row">

                    <!-- Post -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-secondary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                            <?php echo $post_count; ?>
                                        </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_posts.php">
                                <div class="panel-footer">
                                    <span class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-secondary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php echo $comment_count; ?>
                                    </div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_comments.php">
                                <div class="panel-footer">
                                    <span class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- User -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-secondary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php echo $user_count; ?>
                                    </div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_users.php">
                                <div class="panel-footer">
                                    <span class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Catergories -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-dark">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                            <?php echo $cater_count; ?>
                                        </div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="admin_cater.php">
                                <div class="panel-footer">
                                    
                                    <span class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->
                <div class = "row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Title', 'Count'],
                                
                                <?php
                                    $title = ['Active Posts','Draft Posts','Catergories','Approved Comments','Unapproved Comments','Admin','Subscriber'];
                                    $count = [$published_post_count, $draft_post_count, $cater_count, $approved_comment_count, $unapproved_comment_count, $admin_count, $subscriber_count];

                                    for($i = 0; $i < count($title); $i++){
                                        echo "['{$title[$i]}', {$count[$i]}],";
                                    }
                                ?>
                            ]);

                            var options = {
                                chart: {
                                    title: 'Admin Info',
                                    subtitle: 'Counts of posts, categories, users, comments.',
                                }
                                
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: '800px'; height: 300px;" class="col-lg-12">
                    </div>

                </div>
                <!-- /.row -->





            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

    </div>
    <!-- /#wrapper -->


    <?php 
        include "admin_includes/admin_footer.php";
    ?>