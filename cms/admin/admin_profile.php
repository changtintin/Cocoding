<?php
    include "admin_includes/admin_header.php";
?>
<body>

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
                        <h1 class="page-header">
                            User
                            <small>Authors</small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->

                <!-- enctype= Sending Different Form Data -->
                <form method="post" enctype="multipart/form-data">
                    <script>
                        function close_alert_edit(){
                            document.getElementById("alert_edit").innerHTML=" ";
                        }
                    </script>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <h2>My Profile</h2>
                        </div>
                        
                    </div>

                    <div class="form-group row" id = "alert_edit" >
                        <script>
                            function close_alert_edit(){
                                document.getElementById("alert_edit").innerHTML=" ";
                            }
                        </script>

                        <?php
                            
                            if(isset($_SESSION['user_id'])){
                                
                        ?>
                    </div>

                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fid" value = "<?php echo $_SESSION['user_id']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_n" class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_n" value = "<?php echo $_SESSION['user_firstname']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_n" class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="last_n" value = "<?php echo $_SESSION['user_lastname']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label  pt-0">Role</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" value="Subscriber" <?php if($_SESSION['user_role']==="Subscriber"){echo "checked";}?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Subscriber
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" value="Admin" <?php if($_SESSION['user_role']==="Admin"){echo "checked";}?>>
                                <label class="form-check-label" for="exampleRadios1">
                                    Admin
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" value = "<?php echo $_SESSION['username']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value = "<?php echo $_SESSION['user_email']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" value = "<?php echo $_SESSION['user_password']?>">
                        </div>
                    </div>

                    
                    
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="edit_user">Modify the Information</button>
                        </div>
                    </div>
                </form>
    

    <?php       
            edit_users($_SESSION['user_id']);    
        }          
    ?>      

  

            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php 
    include "admin_includes/admin_footer.php";
?>
