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
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Posts  
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
                        <div id = "order_field" class="text-right" style="display:none;">
                            <div class="btn-group dropup mr-3" style="padding-bottom: 10px;">
                                <div class="btn-group mr-3" role="group">
                                    <select class="btn-group form-control" name="col">
                                        <option selected disabled >Sort by</option>
                                        <option value = "post_id">ID</option>
                                        <option value = "post_author">Author</option>
                                        <option value = "post_title">Title</option>
                                        <option value = "post_cater_id">Category</option>
                                        <option value = "post_comment_count">Comment count</option>
                                        <option value = "post_view_count">View count</option>
                                        <option value = "post_date">Date</option>
                                        <option value = "post_like">Like</option>
                                        <option value = "post_dislike">Dislike</option>         
                                    </select>
                                </div>
                                <div class="btn-group mr-3" role="group">
                                    <select class="btn-group form-control" name="order">
                                        <option selected disabled >In</option>
                                        <option value = "ASC">Ascending</option>
                                        <option value = "DESC">Descending</option>       
                                    </select>
                                </div>
                                <div class="btn-group mr-3" role="group">
                                    <button type="submit" class="btn btn-primary" name="sort_submit" onclick="hide_sort()">
                                        <span class="glyphicon glyphicon-sort"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post">
                        <div class="text-right" style="padding-bottom: 20px;">
                            
                            <div class="btn-group dropup mr-3">
                                <div class="btn-group mr-3" role="group">
                                    <select class="btn-group form-control" id="exampleFormControlSelect1" name = "comment_setting">
                                        <option selected disabled >Setting</option>
                                        
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
                                <div class="btn-group mr-3" role="group">
                                    <a class="btn btn-primary" id="sorting_button" href="#">
                                        <i style = "font-weight:600; color: #ffffb5;">
                                            SORT                                            
                                        </i>
                                    </a>
                                </div>
                                <div class="btn-group mr-3" role="group">
                                    <a href="admin_posts.php?source=admin_add_posts" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span>
                                        New post
                                    </a>
                                </div>
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
                                    <th scope = "col">ID</th>
                                    <th scope = "col">Title</th>
                                    <th scope = "col">Catergory</th>
                                    <th scope = "col">Status </th>
                                    <th scope = "col">Image</th>
                                    <th scope = "col">Tags</th>
                                    <th scope = "col">Comments</th>
                                    <th scope = "col">Views</th>
                                    <th scope = "col">Date</th>
                                    <th scope = "col">Like</th>
                                    <th scope = "col">Dislike</th>
                                    <th scope = "col">Select</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php
                                        $order = "";
                                        //ORDER BY `posts`.`post_id` ASC
                                        if(isset($_POST['sort_submit'])){
                                            $order = " ORDER BY ".$_POST['col']." ".$_POST['order'];
                                        }
                                        
                                        $sql = "SELECT * FROM ".POSTS. " WHERE post_author_id = '{$_SESSION['user_id']}'{$order};";
                                        $query = mysqli_query($connect, $sql);
                                        if(!$query){
                                            die("Error").mysqli_error($connect, $query);
                                        }
                                        if(mysqli_num_rows($query) > 0){
                                            while($row = mysqli_fetch_assoc($query)){
                                                
                                                $id = $row['post_id'];
                                                
                                                $title = $row['post_title'];
                                                $cater = $row['post_cater_id'];
                                                $status = $row['post_status'];
                                                $img = $row['post_image'];
                                                $tags = $row['post_tags'];
                                                $comment = $row['post_comment_count'];
                                                $view = $row['post_view_count'];
                                                $date = $row['post_date'];
                                                $like = $row['post_like'];
                                                $dislike = $row['post_dislike'];
                                    ?>
                                            <tr>
                                                <th scope="row"><?php echo $id;?></th>                
                                                <td>
                                                    <a href="../post.php?p_id=<?php echo $id; ?>"> 
                                                        <?php echo $title;?>
                                                    </a>
                                                </td>       
                                                               
                                                <td><?php echo $cater;?></td>

                                                <td><?php echo $status;?></td>   
                                                
                                                <td><img class="media-object" src="../image/<?php echo $img;?>" alt="" style="width:100px;height:100px;"></td>

                                                <td><?php echo $tags;?></td>
                            
                                                <td><?php echo $comment;?></td>

                                                <td><?php echo $view;?></td>
                                            
                                                <td><?php echo $date;?></td>
                                                <td><?php echo $like;?></td>
                                                <td><?php echo $dislike;?></td>


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
                                        else{
                                            echo'
                                                <div class="col-lg-12">
                                                    <h1 class="page-header">
                                                        <small>
                                                            No Article yet
                                                        </small>
                                                    </h1>
                                                </div>
                                            ';
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
