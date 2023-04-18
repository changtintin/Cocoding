                <?php 
                    
                    if(isset($_POST['like_btn'])){
                        $like_dis = 'like';
                        like_dis($connect, $p_id, $like_dis);
                        
                    }
                    if(isset($_POST['dislike_btn'])){
                        $like_dis = 'dislike';
                        like_dis($connect, $p_id, $like_dis);
                    }
                    
                ?>
                
                <div class="well">
                    
                    <form method="post">
                        <div class="col">
                            <h4>What do you think?</h4>
                            
                            <label for="like_btn">
                                <?php echo $like; ?> users like this post
                            </label>

                            <button class="btn btn-success btn-sm" id = "like_btn"  name = "like_btn" type="submit">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Like
                            </button>

                            <span style="padding-left:20px;"></span>
                            <label for="dislike_btn" >
                                <?php echo $dislike; ?> users dislike this post
                            </label>
                            <button class="btn btn-primary btn-sm" id = "dislike_btn"  name = "dislike_btn" type="submit">
                                <span class="glyphicon glyphicon-thumbs-down"></span> Dislike
                            </button>
                        </div>
                    </form>
                    

                </div>
                
                <!-- Comments Form -->
                <div class="well">
                    <!-- enctype= Sending Different Form Data -->
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-10 text-muted "> 
                                <h4>Leave a comment?</h4>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label  pt-0">Comment</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name="comment_content"></textarea>
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label  pt-0" for = "cater_id">In response to</label>
                            <div class="col-sm-8">
                                <select multiple class="form-control" name = "cater_id">
                                    <?php
                                        
                                        if($connect){
                                            $sql = "SELECT * FROM ".POSTS;
                                            $query = mysqli_query($connect, $sql);
                                            if(mysqli_num_rows($query) > 0){
                                                while($row = mysqli_fetch_assoc($query)){
                                                    $name = $row['post_title'];
                                                    $id = $row['post_id'];
                                    ?>
                                            <option value = "<?php echo $id;?>"><?php echo $name;?></option>    
                                    <?php                
                                                }
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Posted Comments -->

                <!-- Comment -->
                <h3 style="padding-top: 50px; padding-bottom: 10px; letter-spacing: 0.6px; font-family: 'Rockwell'; color: #ad9f95;">
                    Responses
                    <p class="lead">
                    ( <?php echo $post_comment_count; ?> comments)
                    </p>
                </h3> 

                <?php
                        $query = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = {$p_id} AND comment_status = 'Approved';";
                        $result = mysqli_query($connect, $query);
                        if($result){                    
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $comment_author = $row['comment_author'];
                                    $comment_date = $row['comment_date'];
                                    $comment_content = $row['comment_content'];
                ?>
                        
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="Photo">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <?php
                                }
                            }
                        }
                ?>

                