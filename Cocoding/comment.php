                <script>
                    var post_id = <?php echo $p_id; ?>;

                    function like(){ 
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', '/Cocoding/includes/function.php?fetch_likes=ok&p_id='+post_id);
                        xhr.onload = function(){
                            console.log(xhr.status); // 200
                            document.getElementById("user_like").innerHTML =  xhr.responseText;
                        }         
                        xhr.send();                                            
                    }

                    function dislike(){ 
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', '/Cocoding/includes/function.php?fetch_dislikes=ok&p_id='+post_id);
                        xhr.onload = function(){
                            console.log(xhr.status); // 200
                            document.getElementById("user_dislike").innerHTML = xhr.responseText;
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
                
                <!-- Like Well -->      
                <div class="well">                    
                    <form method="post">
                        <div class="col">
                            <h3 class="response_title">
                                <?php echo _FEEL_COMMENT; ?>
                            </h3> 

                            <!-- Like -->                           
                            
                            <?php 
                                $login = "";                                
                                if(isset($_SESSION['username'])){
                                    post_show_user_feel($connect, $post_id);
                                }    
                                else{
                                    echo '                                        
                                        <small style="color:#be6464">
                                            '._LOGIN_LIKE_MSG.'                                     
                                        </small>           
                                        <br>                            
                                    ';
                                    $login = "disabled";  
                                }  

                                echo'
                                    <button class="btn btn-success btn-sm" id = "like_btn"  name = "like_btn" type="submit" '.$login.'>
                                        <span class="glyphicon glyphicon-thumbs-up"></span> 
                                        '._LIKE_BTN.'
                                    </button>
                                ';
                            
                                                         
                            ?>
                            <label for="like_btn" id = "user_like">                                 
                            </label>

                            <!-- Dislike --> 
                            <span style="padding-left:20px;"></span>                                 
                            <?php                                 
                                echo '
                                    <button class="btn btn-primary btn-sm" id = "dislike_btn"  name = "dislike_btn" type="submit" '.$login.'>
                                        <span class="glyphicon glyphicon-thumbs-down"></span> 
                                        '._DISLIKE_BTN.'
                                    </button>
                                ';                                
                            ?>
                            <label for="dislike_btn" id = "user_dislike" >                                    
                            </label> 
                            
                        </div>
                    </form>
                </div>

                <!-- Comments Form -->                                                    
                    <!-- enctype= Sending Different Form Data -->                    
                    <form action="" method="post" enctype="multipart/form-data">                        
                        <div class="form-group row">
                            <div class="col-sm-10 text-muted" > 
                                <h3 class="response_title">
                                    <?php echo _COMMENT_WELL; ?>
                                </h3>
                            </div>
                        </div>
                        <?php
                            if(isset($_SESSION['user_id'])){
                                echo '
                                    <div class="form-group row">
                                        <label class="col-sm-9 col-form-label pt-0" for="myCheck">
                                        '._COMMENT_ID_MSG.'                                       
                                        <div class="col-sm-3">
                                            <input class="form-check-input" type="checkbox" id="roleCheck" onclick="roleChange()">
                                        </div>
                                    </div> 
                                ';
                            }
                            
                        ?>                        
                        <div class="form-group row " id="text" style="display:block">
                            <label for="author" class="col-sm-2 col-form-label">
                                <?php echo _AUTHOR_POST; ?>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="author">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="summernote" class="col-sm-2 col-form-label">
                                <?php echo _COMMENT_CONTENT; ?>
                            </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="comment_content"  id="summernote"></textarea>
                            </div>
                        </div>                        

                        <?php                            
                            $post_comment_count = comment_count($connect, $post_id);
                        ?>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">
                            <?php echo _COMMENT_MAIL; ?>
                            </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="create_comment">
                                    <?php echo _SUBMIT_BTN?>
                                </button>
                            </div>
                        </div>
                    </form>
                <hr>
                <!-- Posted Comments -->
                
                <!-- Comment -->
                <h3 class="response_title">
                    <?php echo _RESPONSE_WELL; ?>
                    <small>
                     <?php echo $post_comment_count." "._COMMENT_NUM; ?> 
                    </small>
                </h3> 

                <div id = "comment_field">
                    <script>
                        $(document).ready (function(){
                            $("#more_comment").click(function(){                                                                   
                                $.ajax({
                                    url: "/Cocoding/includes/function.php",
                                    type: "post",
                                    dataType: "text",
                                    data: {
                                        p_id: post_id,                                        
                                        more_comment: 1                                        
                                    },
                                    success: function(result){
                                        $("#comment_field").html(result);
                                    }
                                });
                            });
                        });        
                    </script>
                    <?php
                        $query = "SELECT * FROM ".COMMENTS." WHERE comment_post_id = {$p_id} AND comment_status = 'Approved' LIMIT 1;";
                        $result = mysqli_query($connect, $query);
                        if($result){                    
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $comment_author = $row['comment_author'];
                                    $comment_date = $row['comment_date'];
                                    $comment_content = $row['comment_content'];
                                    echo"
                                        <div class='media'>
                                            <a class='pull-left' href='#'>
                                                <img class='media-object' src='http://placehold.it/64x64' alt='Photo'>
                                            </a>
                                            <div class='media-body'>
                                                <h4 class='media-heading'>
                                                {$comment_author}
                                                    <small>{$comment_date}</small>
                                                </h4>
                                    ";                                        
                                    show_content($comment_content);
                                    echo"                                   
                                            </div>
                                        </div>
                                    ";                
                                }
                                    echo '
                                        <div style="padding-top: 15px">
                                            <button class = "btn btn-primary" id = "more_comment" type = "submit">
                                                '._COMMENT_MORE.'
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </button>
                                        </div>
                                    ';
                            }
                        }
                    ?>
                </div>

                