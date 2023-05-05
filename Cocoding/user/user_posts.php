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
            <div class="container-fluid">

                <?php
                    // Query Confirm massenge alert
                    query_msg_alert();

                    if(isset($_GET['request'])){
                        $request = $_GET['request'];
                    }
                    else{
                        $request = '';
                    }
                    
                    //different action
                    switch($request){
                        case 'user_add_posts':
                            include "./user_includes/user_add_posts.php";
                            break;

                        case 'user_edit_posts':
                            include "./user_includes/user_edit_posts.php";
                            break;
                            
                        default:    
                            include "./user_includes/user_view_posts.php";
                            break;
                    }
                ?>                        
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
    
    document.getElementById("sorting_button").onclick = function() {
        let order_field = document.getElementById('order_field');

        if(order_field.style.display != 'none'){
            order_field.style.display = 'none';
            document.getElementById("sorting_button").style.color="#bd9592";
        }
        else {
            order_field.style.display = 'block';
            document.getElementById("sorting_button").style.color="#85b292";
        }
    }

    
    function hide_sort(){
        let order_field = document.getElementById('order_field');
        order_field.style.display = 'none';
    }
</script>


