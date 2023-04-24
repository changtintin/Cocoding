<?php
    include "user_header.php";
?>
<body>
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
            ?>    

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12" style="padding-bottom: 20px;padding-top: 20px;">
                        <h1>
                            Like/Dislike History
                            <small>
                                <?php echo $_SESSION['username'];?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
 
                <div class="row" style="padding-top: 15px;">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a data-toggle="tab" href="#all" style="color:#9999f5;">All Posts</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#like_post" style="color:#9999f5;">Like Post</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#dis_post" style="color:#9999f5;">Dislike Post</a>
                        </li>
                    </ul>
                </div>  
                
                <!-- /.row -->
                <div class="row">

                    <div class="tab-content">
                        <div id="all" class="tab-pane fade in active">                            
                            <?php 
                                $like = "no";
                                include "user_like_table.php";                                
                            ?>                            
                        </div>

                        <div id="like_post" class="tab-pane fade">                            
                            <?php 
                                $like = "like";
                                include "user_like_table.php";                                
                            ?>
                        </div>

                        <div id="dis_post" class="tab-pane fade">                           
                            <?php 
                                $like = "dislike";
                                include "user_like_table.php";                                
                            ?>
                        </div>
                        
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
        include "user_footer.php";
    ?>

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

