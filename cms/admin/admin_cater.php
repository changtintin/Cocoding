
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
                            Catergories
                            <small>Author.</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
            
                <div id="loader"></div>
                <div style="display:none;" id="myDiv" class="animate-bottom">
                
                    <script>
                        function close_alert_edit(){
                            document.getElementById("alert_edit").innerHTML=" ";
                        }
                    </script>
                    <?php
                        query_msg_alert();
                        edit_cater();
                        insert_cater();
                    ?>
                    <div class="col-sm-6">
                        
                        <!-- Add Catergory -->
                        <form action="admin_cater.php" method="post">
                            <div class="form-group row">
                                <label lass = "col-sm-6" for="InputNewCater">Add Catergory</label>
                                <input type="text" class="form-control" id="InputNewCater" placeholder="Catergory name" name = "new_cater_add">
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary" name = "new_cater_submit" value = "Add a new one">Submit</button>
                            </div>
                        </form>
                    
                        
                        <!-- Edit Catergory -->
                        <form action="admin_cater.php?" method="GET">
                            <div class="form-group row">
                                <label lass = "col-sm-6" for="EditCater">Edit Catergory Name</label>
                                <input type="text" class="form-control" id="EditCater" name = "edit_cater_name" value = "<?php  if(isset($_GET['edit_old_name'])) echo $_GET['edit_old_name'];?>">
                            </div>
                            
                            <div class="form-group row">
                                <button type="submit" class="btn btn-primary" name = "edit_cater_submit" value="<?php if(isset($_GET['edit_old_name'])) echo $_GET['edit_old_name'];?>">Submit</button>
                            </div>

                        </form>            
                    </div>
                    

                    <!-- Catergories Table -->
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover">
                            <caption><h4>Post Catergories</h4></caption>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $q = "SELECT * FROM ". CATER;
                                    $select_cater_sidebar = mysqli_query($connect, $q);
                                    if($select_cater_sidebar){
                                        
                                        while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <?php 
                                                echo $fetch_row['cat_id']; 
                                                $cat_id = $fetch_row['cat_id'];
                                                $cat_title = $fetch_row['cat_title'];

                                            ?>
                                        </th>
                                        <td>
                                            <?php 
                                                echo $fetch_row['cat_title']; 
                                            ?>
                                        </td> 
                                        <td>
                                            <a href="admin_cater.php?&delete_id=<?php echo $cat_id;?>">
                                                Delete
                                            </a>
                                        
                                        </td> 
                                        <td>
                                            <a href="admin_cater.php?edit_old_name=<?php echo $cat_title;?>" >
                                                Edit
                                            </a>
                                        </td>
                                    </tr> 
                                    
                                        <?php                                    
                                        }
                                    }
                                        ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<?php 
    delete_cater();
    include "admin_includes/admin_footer.php";
?>
