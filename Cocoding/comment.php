                <?php                     
                    if(isset($_POST['like_btn'])){
                        $like_dis = 'like';
                        user_feel($connect, $p_id, $like_dis);
                        
                    }
                    if(isset($_POST['dislike_btn'])){
                        $like_dis = 'dislike';
                        user_feel($connect, $p_id, $like_dis);
                    }                    
                ?>
                <script>
                    var post_id = <?php echo $p_id; ?>;

                    function like(){ 
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', 'includes/function.php?fetch_likes=ok&p_id='+post_id);
                        xhr.onload = function(){
                            console.log(xhr.status); // 200
                            document.getElementById("user_like").innerHTML =  xhr.responseText;
                        }         
                        xhr.send();                                            
                    }

                    function dislike(){ 
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', 'includes/function.php?fetch_dislikes=ok&p_id='+post_id);
                        xhr.onload = function(){
                            console.log(xhr.status); // 200
                            document.getElementById("user_dislike").innerHTML =  xhr.responseText;
                        }         
                        xhr.send();                                            
                    }

                    setInterval(like, 2000);
                    setInterval(dislike, 2000);

                    function roleChange() {
                        var checkBox = document.getElementById("roleCheck");
                        var text = document.getElementById("text");
                        if (checkBox.checked == false){
                            text.style.display = "block";
                        } else {
                            text.style.display = "none";
                        }
                    }
                </script>
                
                
                <div class="well">                    
                    <form method="post">
                        <div class="col">
                            <h3 class="response_title">What do you think?</h3>
                           
                            <label for="like_btn" id = "user_like">
                                
                            </label>
                            
                            <button class="btn btn-success btn-sm" id = "like_btn"  name = "like_btn" type="submit">
                                <span class="glyphicon glyphicon-thumbs-up"></span> Like
                            </button>

                            <span style="padding-left:20px;"></span>                            
                                <label for="dislike_btn" id = "user_dislike" >
                                    
                                </label>                                                   
                            <button class="btn btn-primary btn-sm" id = "dislike_btn"  name = "dislike_btn" type="submit">
                                <span class="glyphicon glyphicon-thumbs-down"></span> Dislike
                            </button>
                        </div>
                    </form>
                </div>
                
               
                <!-- Comments Form -->                                
                    
                    <!-- enctype= Sending Different Form Data -->
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <div class="col-sm-10 text-muted" > 
                                <h3 class="response_title">Leave a comment?</h3>
                            </div>
                        </div>

                        <?php
                            if(isset($_SESSION['user_id'])){
                                echo '
                                    <div class="form-group row">
                                        <label class="col-sm-9 col-form-label pt-0" for="myCheck">
                                            Use my username instead                                            
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" id="roleCheck" onclick="roleChange()">
                                        </div>
                                    </div> 
                                ';
                            }
                            
                        ?>
                        

                        <div class="form-group row " id="text" style="display:block">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="summernote" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="40" name="comment_content"  id="summernote"></textarea>
                            </div>
                        </div>

                        <?php                            
                            $post_comment_count = comment_count($connect, $post_id);
                        ?>

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
                <hr>
                <!-- Posted Comments -->
                
                <!-- Comment -->
                <h3 class="response_title">
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
                        <?php                              
                            show_content($comment_content);                                                  
                        ?>
                    </div>
                </div>
                <?php
                                }
                            }
                        }
                ?>

                