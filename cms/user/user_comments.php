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
                function close_alert_edit(){
                    document.getElementById("alert_edit").innerHTML=" ";
                }
            </script>

            <?php 
                query_msg_alert();                
            ?>    

            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                            <small>
                                <?php echo $_SESSION['username'];?>
                            </small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                       
                <!-- /.row -->
                <div class="row">
                    <form method="post">
                        <div class="text-right" style="padding-bottom: 20px;">
                            
                            <div class="btn-group dropup mr-3">
                                <div class="btn-group mr-3" role="group">
                                    <select class="btn-group form-control" id="exampleFormControlSelect1" name = "comment_setting">
                                        <option selected disabled >Setting</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Unapproved">Unapproved</option>
                                        <option value="Delete"> Delete</option>
                                    </select>
                                </div>
                                <div class="btn-group mr-3" role="group">
                                    <button type="submit" class="btn btn-primary" name="comment_setting_submit">
                                        Apply.
                                    </button>
                                </div>
                            </div>
                                    
                            <div class="btn-group mr-3 " role="group">
                                
                                <div class="btn-group mr-3" role="group" >
                                    <button type="submit" class="btn btn-primary float-right" name ="select_all">
                                        Select All
                                    </button>
                                </div>

                                <div class="btn-group mr-3" role="group">
                                    <button type="submit" class="btn btn-primary float-right" name ="cancel_all">
                                        Cancel
                                    </button>
                                </div>
                                
                            </div>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>                                    
                                    <th scope="col">Comment</th>  
                                    <th scope="col">Post title</th>          
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Select</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $ary_index = 0;
                                        $sql = "SELECT * FROM ".COMMENTS." WHERE comment_role = 'Member' && comment_author = '{$_SESSION['username']}'";
                                        $query = mysqli_query($connect, $sql);
                                        if(mysqli_num_rows($query) > 0){
                                            while($row = mysqli_fetch_assoc($query)){
                                                
                                                $id = $row['comment_id'];
                                                $p_id = $row['comment_post_id'];
                                                $author = $row['comment_author'];
                                                $email = $row['comment_email'];
                                                $content = $row['comment_content'];
                                                $status = $row['comment_status'];
                                                $date = $row['comment_date'];
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $id;?></th>                
                                                             
                                                <td>
                                                    <?php 
                                                        
                                                        $delimiter = ' ';
                                                        $words = explode($delimiter, $content);
                                                        $i = 10;
                                                        foreach ($words as $word){
                                                            echo $word." ";
                                                            
                                                            if($i == 0){
                                                                echo "<br>";
                                                                $i = 10;
                                                            }
                                                            $i--;
                                                        }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a href="../post.php?p_id=<?php echo $p_id; ?>"> 
                                                        <?php echo fetch_commented_post($p_id);?>
                                                    </a>
                                                </td>

                                                <td><?php echo $status;?></td>     
                                                <td><?php echo $date;?></td>

                                                <td>                        
                                                    <div class="form-check checkbox-lg">
                                                        <input type="checkbox" class="form-check-input" name="select_ary[]" value = "<?php echo  $id;?>" <?php select_all(); ?>>                                                  
                                                    </div>                        
                                                </td>

                                                <td>                        
                                                    <a href="./admin_posts.php?source=admin_edit_posts&edit_id=<?php echo  $id;?>">
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
                    </form>
                    
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
    function close_alert_edit(){
        document.getElementById("alert_edit").innerHTML=" ";
    }
</script>

<?php

    if(isset($_POST['comment_setting_submit'])){
        if(isset($_POST['comment_setting'])){
            if($_POST['comment_setting']=='Delete'){
                foreach($_POST['select_ary'] as $checkbox){
                    decrease_comment_count($checkbox);
                    $sql = "DELETE FROM ".COMMENTS." WHERE comment_id = {$checkbox}";
                    $q = mysqli_query($connect, $sql);
                }
                $msg = query_confirm($q);     
                
                header("Location: http://localhost:8888/cms/admin/admin_comments.php?confirm_msg={$msg}", TRUE, 301);
                exit(); 
            }
            else{
                approve_comments($_POST['comment_setting']);
            }
        }
    }
?>
