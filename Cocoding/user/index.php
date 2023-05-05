<?php
    include "user_header.php";
    // Protect from user access from url
    if(!isset($_SESSION) || empty($_SESSION['user_role'])){
        $msg = "ERROR, Please sign up for further access to user admin, ";
        $msg .= "<a href = './registration.php'><strong>register now</strong></a>";
        header("Location: ../index.php?confirm_msg={$msg}", true, 301);
    }

?>
<body >
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            
            include "user_nav.php"; 
        ?>

        <div id="page-wrapper">

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

            <?php 
                query_msg_alert();
                if(isset($_SESSION['user_id'])){
                    $user_id = $_SESSION['user_id'];
                }
                else{
                    $user_id = -1;
                }

                if(isset($_SESSION['username'])){
                    $user_n = $_SESSION['username'];
                }
                else{
                    $user_n = " ";
                }
                
                $published_post_count = fetch_row_count(POSTS," WHERE post_status='Published' AND post_author_id='{$user_id}'");
                $draft_post_count = fetch_row_count(POSTS," WHERE post_status='Draft' AND post_author_id='{$user_id}'");
                $approved_comment_count = fetch_row_count(COMMENTS," WHERE comment_status='Approved' AND comment_author = '{$user_n}'");
                $unapproved_comment_count = fetch_row_count(COMMENTS," WHERE comment_status='Unapproved' AND comment_author = '{$user_n}'");
            ?>    

            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to <?php echo $_SESSION['username']."'s";?> Admin  <small>
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
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-secondary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'>
                                            <?php echo $published_post_count + $draft_post_count; ?>
                                        </div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user_posts.php">
                                <div class="panel-footer">
                                    <span class="pull-right">View Details <i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Comment -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-secondary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php echo $approved_comment_count + $unapproved_comment_count; ?>
                                    </div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="user_comments.php">
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
                                    $title = ['Active Posts','Draft Posts','Approved Comments','Unapproved Comments'];
                                    $count = [$published_post_count, $draft_post_count, $approved_comment_count, $unapproved_comment_count];

                                    for($i = 0; $i < count($title); $i++){
                                        echo "['{$title[$i]}', {$count[$i]}],";
                                    }
                                ?>
                            ]);

                            var options = {
                                chart: {
                                    title: 'Admin Info',
                                    subtitle: 'Counts of posts, users, comments.',
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
        include "./user_includes/user_footer.php";
    ?>