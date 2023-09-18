<?php
    include "user_includes/user_header.php";
?>
<body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            include "user_includes/user_nav.php"; 
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
                // query_msg_alert();                
            ?>    

            <div class="container-fluid">                
                <!-- Page Heading -->
                <div class="row">                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo _USER_COMM;?>
                            <small>                                
                                <?php echo _FROM_POST;?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                       
                <!-- /.row -->
                <div class="row" >
                    <div class='col-lg-12'>                                                
                            <div class="text-right" style="padding-bottom: 20px;"> 
                                <div class="btn-group mr-3 " role="group"> 
                                    <h4>
                                        <?php echo _SELECT_POST; ?>
                                    </h4>     
                                </div>                                  
                                <div class="btn-group dropup mr-3">
                                    <div class="btn-group mr-3" role="group">                                        
                                        <select class="btn-group form-control" id = "comment_post_title" name = "comment_post_title">
                                            <option selected disabled >
                                                <?php echo _POST_TITLE; ?>
                                            </option>
                                            <?php
                                                $sql = "SELECT post_title FROM posts WHERE post_author = '{$_SESSION['username']}';";
                                                $q = mysqli_query($connect, $sql);
                                                if($q){
                                                    if(mysqli_num_rows($q) > 0){
                                                        while($title = mysqli_fetch_array($q)){
                                                            echo '<option value="'.$title[0].'"> '.$title[0].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="btn-group mr-3" role="group">
                                        <button type="submit" class="btn btn-primary" name="post_find_comment" id = "post_find_comment">
                                            <?php echo _APPLY;?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover" >
                                <div class = "comment_tb_field"> </div> 
                            </table>                        
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
        include "user_includes/user_footer.php";
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
        
            default:
                document.getElementById("alert_edit").innerHTML = " ";
            break;
        }
    }

    $(document).ready(function(){                
        $("#post_find_comment").click(function(){
            var comment_post_title = $("#comment_post_title").val();
            $.ajax({
                url: "/Cocoding/includes/function.php?lang=<?php echo $_SESSION['lang'];?>",
                type: "post",
                dataType: "text",
                data: {
                    post_find_comment: 1,                    
                    comment_post_title: comment_post_title                                                                                   
                },
                success: function(result){                    
                    $(".comment_tb_field").html(result);
                }
            });                        
        });        
    });
</script>

