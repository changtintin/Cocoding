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
                    Go
                </button>
            </div>
        </div>
    </div>
</form>
        
<form method="post" name = "postStatus">
    <div class="text-right" style="padding-bottom: 20px;">
        <div class="btn-group dropup mr-3">
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" id="select" name = "post_setting">
                    <option selected disabled >Setting</option>
                    <option value = "Spam">Spam</option>
                    <option value = "Draft">Draft</option>
                    <option value = "Published">Published</option>
                    <option value = "Delete">Delete</option>
                    <option value = "Duplicate">Duplicate</option>
                    <option value = "ResetViews">Reset Views</option>
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary" name="post_setting_submit" id="post_setting">
                    Apply
                </button>
            </div>
        </div>
            
        <div class="btn-group mr-3 " role="group">
            <div class="btn-group mr-3" role="group">
                <button class="btn btn-primary" id="del_button" onclick = "del_confirm()">
                    <i style = "font-weight:600; color: #ffffb5;">
                        DELETE                                            
                    </i>
                </button>
            </div>
            
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
                    Cancel!
                </button>
            </div>
        </div> 
    </div>

    <table class="table table-bordered table-hover" id = "posts_table">
        <thead>
            <tr>
                <th scope = "col">ID</th>
                <th scope = "col">Author</th>
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

                    $sql = "SELECT * FROM(SELECT P.*, C.* FROM posts AS P LEFT JOIN categories AS C ";
                    $sql .="ON P.post_cater_id = C.cat_id )AS T".$order;
                    $query = mysqli_query($connect, $sql);
                    if(!$query){
                        die("Error").mysqli_error($connect, $query);
                    }
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                            
                            $id = $row['post_id'];
                            $author = $row['post_author'];
                            $title = $row['post_title'];
                            $cater = $row['cat_title'];
                            $status = $row['post_status'];
                            $img = $row['post_image'];
                            $comment = comment_count($connect, $id);
                            $view = $row['post_view_count'];
                            $date = $row['post_date'];
                            $like = $row['post_like'];
                            $dislike = $row['post_dislike'];
                ?>
                            <tr>
                                <th scope="row"><?php echo $id;?></th> 
                            
                                <td><?php echo $author;?></td>
                            
                                <td><a href="../post.php?p_id=<?php echo $id;?>" ><?php echo $title;?></a></td>
                                
                                <td><?php echo $cater;?></td>
                            
                                <td><?php echo $status;?></td>
                            
                                <td><img class="media-object" src="../image/<?php echo $img;?>" alt="" style="width:100px;height:100px;"></td>
                            
                                <td><?php fetch_tags($id, $connect, "admin"); ?></td>
                            
                                <td>
                                    <a href="admin_comments.php?pid=<?php echo $id; ?>">
                                        <?php echo $comment;?>
                                    </a>                                    
                                </td>

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
                ?>
            </tbody>
    </table>
</form>


<script>
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
    
    // function del_confirm(){
    //     if(confirm("Press a button!") == true){
    //         const xhr = new XMLHttpRequest();
    //         var v = document.getElementById('numIn').innerText;
    //         console.log(v);
    //         xhr.open('GET', '../includes/function.php?formData='+v);
    //         xhr.send();  
            
    //         xhr.onload = function(){
    //             console.log(xhr.status); // 200
    //             document.getElementById("numIn").innerHTML = xhr.responseText;
    //         }         
    //     }
    //     else{
    //         document.getElementById("numIn").innerHTML="<h1>Cancel</h1>";
    //     }
    // }
</script>


<?php
    if(isset($_POST['post_setting_submit'])) {
       edit_post_status();
    }  
?>
