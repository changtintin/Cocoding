
<form method="post">
    <div class="text-right" style="padding-bottom: 20px; padding-top: 20px;">
        
        <div class="btn-group dropup mr-3">
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" id="exampleFormControlSelect1" name = "comment_setting">
                    <option selected disabled >Setting</option>                                        
                    <option value="Delete"> Delete Record </option>
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary" name="comment_setting_submit">
                    Apply
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
                <th scope = "col">ID</th>
                <th scope = "col">Title</th>
                
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
                    
                    
                    if($like == 'dislike'){
                        $user_feel = " AND user_feel = 'dislike' ";
                    }
                    else if ($like == 'like'){
                        $user_feel = " AND user_feel = 'like' ";
                    }                                 
                    else{
                        $user_feel = " ";
                    }

                    $sql = "SELECT * FROM ".LIKES. " WHERE user_id = '{$_SESSION['user_id']}'".$user_feel;
                    $query = mysqli_query($connect, $sql);
                    if(!$query){
                        die("Error").mysqli_error($connect, $query);
                    }
                    if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_assoc($query)){
                            $post_id = $row['post_id'];
                                                    
                            $sql2 = "SELECT * FROM ".POSTS. " WHERE post_id = '$post_id'";
                            
                            $query2 = mysqli_query($connect, $sql2);

                            if(!$query2){
                                die("Error").mysqli_error($connect, $query2);
                            }
                            if(mysqli_num_rows($query2) > 0){

                                while($row2 = mysqli_fetch_assoc($query2)){
                                    $id = $row2['post_id'];
                                    
                                    $title = $row2['post_title'];
                                    
                                    
                                    $img = $row2['post_image'];
                                    $tags = $row2['post_tags'];
                                    $comment = $row2['post_comment_count'];
                                    $view = $row2['post_view_count'];
                                    $date = $row2['post_date'];
                                    $like = $row2['post_like'];
                                    $dislike = $row2['post_dislike'];
                ?>
                        <tr>
                            <th scope="row"><?php echo $id;?></th>                
                            <td>
                                <a href="../post.php?p_id=<?php echo $id; ?>"> 
                                    <?php echo $title;?>
                                </a>
                            </td>       
                            
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

                            
                        </tr>
                <?php

                                }
                            }    
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
