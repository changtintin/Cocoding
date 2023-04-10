
<?php
    include "admin_includes/admin_header.php";
?>



<body onload="myFunction()" style="margin:0;">

    <div id="wrapper">
        <!-- Navigation -->
        <?php 
            include "admin_includes/admin_nav.php"; 
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 30px;">
                        <h1 class="page-header">
                            Posts
                            <small>Author</small>
                        </h1>
                    </div>
                </div>

                <div id="loader"></div>
                <div style="display:none;" id="myDiv" class="animate-bottom">

                    <!-- JS function for Query Confirm massenge-->
                    <script>
                        function close_alert_edit(){
                            document.getElementById("alert_edit").innerHTML=" ";
                        }
                    </script>

                    <?php
                        // Query Confirm massenge alert
                        query_msg_alert();

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }
                        else{
                            $source = '';
                        }
                        
                        //different action
                        switch($source){
                            case 'admin_add_posts':
                                include "admin_includes/admin_add_posts.php";
                                break;
                            case 'admin_edit_posts':
                                include "admin_includes/admin_edit_posts.php";
                                break;
                            default:
                                include "admin_includes/admin_view_posts.php";
                                break;
                        }
                    ?>
                </div>
               
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php 
    include "admin_includes/admin_footer.php";
?>
