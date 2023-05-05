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
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="padding-top: 30px;">
                            User
                            <small>Authors</small>
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
                            case 'admin_add_users':
                                include "admin_includes/admin_add_users.php";
                                break;
                            case 'admin_edit_users':
                                include "admin_includes/admin_edit_users.php";
                                break;
                            default:
                                include "admin_includes/admin_view_users.php";
                                break;
                        }
                        
                        add_user();
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
