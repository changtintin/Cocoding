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
            <!-- Page Heading -->
            <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                            <small>
                                <?php echo $_SESSION['username'];?>
                            </small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
            <div class="container-fluid">
                
                
                       
                <!-- /.row -->
                <div class="row">
                    <form method="post" enctype="multipart/form-data">
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
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <h2>My Profile</h2>
                            </div>
                            
                        </div>

                        <div class="form-group row" id = "alert_edit" >
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
                                
                                
                                if(isset($_SESSION['user_id'])){
                                    $sql = "SELECT * FROM ".USERS. " WHERE user_id = ".$_SESSION['user_id'];
                                    $q = mysqli_query($connect, $sql);
                                    if(!$q){
                                        echo "Error";
                                    }
    
                                    if($q && mysqli_num_rows($q) > 0){
                                        if($row = mysqli_fetch_assoc($q)){
                                            $user_id = $row['user_id'];
                                            $user_firstname = $row['user_firstname'];
                                            $user_lastname = $row['user_lastname'];
                                            $user_role = $row['user_role'];
                                            $username = $row['username'];
                                            $user_email = $row['user_email'];
                                            $user_password = $row['user_password'];
                                        
                                        
                                    
                            ?>
                        </div>

                        <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fid" value = "<?php echo $user_id; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_n" class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_n" value = "<?php echo $user_firstname; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_n" class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_n" value = "<?php echo $user_lastname; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label  pt-0">Role</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" value="Subscriber" <?php if($user_role === "Subscriber"){echo "checked";}?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Subscriber
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" value="Admin" <?php if($user_role === "Admin"){echo "checked";}?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Admin
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value = "<?php echo $username; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value = "<?php echo $user_email; ?>">
                        </div>
                    </div>
                    
                    <fieldset disabled>
                        <div class="form-group row">
            
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="password" id = "password" value = "<?php echo $user_password; ?>" disabled>
                            </div>
                        </div>
                    </fieldset>
                        
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="edit_user">
                                <span class="glyphicon glyphicon-save"></span> 
                                Save
                            </button>
                        </div>
                    </div>
                </form>
        

                    <?php       
                            edit_profile($_SESSION['user_id']);

                                }
                                                
                            }
                        }          
                    ?>      
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


