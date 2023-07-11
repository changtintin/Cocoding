<div class="col-lg-12" style="padding-top: 10px;">
    
</div>
<form method="post">
    <h1 id = "test"></h1>
    <div id = "sortFilter" class="text-right" style="display:none;">
        <div class="btn-group dropup mr-3" style="padding-bottom: 10px;">
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" name="col">
                    <option selected disabled >
                        <?php echo _SORT_BY_BTN;?>
                    </option>
                    <option value = "post_id">
                        <?php echo _ID;?>
                    </option>
                    <option value = "post_author">
                        <?php echo _AUTHOR_POST; ?>
                    </option>
                    <option value = "post_title">
                        <?php echo _POST_TITLE;?>
                    </option>
                    <option value = "post_cater_id">
                        <?php echo _CATER_WELL;?>
                    </option>
                    <option value = "post_view_count">
                        <?php echo _VIEW; ?>
                    </option>
                    <option value = "post_date">
                        <?php echo _DATE; ?>
                    </option>       
                    <option value = "post_like">
                        <?php echo _LIKE_BTN; ?> 
                    </option>
                    <option value = "post_dislike">
                        <?php echo _DISLIKE_BTN; ?>
                    </option>     
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" name="order">
                    <option selected disabled >
                        <?php echo _SORT_WAY;?>
                    </option>
                    <option value = "ASC">
                        <?php echo _ASC;?>
                    </option>
                    <option value = "DESC">
                        <?php echo _DEC;?>
                    </option>       
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary" name="sortSubmit">
                    <?php echo _SUBMIT_BTN;?>
                </button>
            </div>
        </div>
    </div>
</form>
        
<form method="post" name = "postStatus" class = "postStatus">
    <div class="text-right" style="padding-bottom: 20px;">
        
        <div class="btn-group dropup mr-3">
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" id="postSetOption" name = "postSetOption">
                    <option selected disabled >
                        <?php echo _SETTING; ?>
                    </option>                    
                    <option value = "Delete">
                        <?php echo _DEL; ?>
                    </option>                   
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary" name="postSetSubmit" id="postSetSubmit">
                    <?php echo _APPLY;?>
                </button>
            </div>
        </div>
            
        <div class="btn-group mr-3 " role="group">
            
            <button class="btn btn-primary" id="showSorting"  type = "button">
                <i style = "font-weight:600; color: #ffffb5;">
                <?php echo _SORT;?>                                            
                </i>
            </button>
           
            <a href="/Cocoding/user/user_posts.php?request=user_add_posts&lang=<?php echo $_SESSION['lang']; ?>" class="btn btn-primary">
                <span class="glyphicon glyphicon-edit"></span>
                <?php echo _ADD_POST; ?>
            </a>            
        </div> 
    </div>
    

    <table class="table table-bordered table-hover" id = "posts_table">
        <thead>
            <tr>
                <th scope = "col">
                    <?php echo _ID; ?>
                </th>               
                <th scope = "col">
                    <?php echo _POST_TITLE; ?>
                </th>
                <th scope = "col">
                    <?php echo _CATER_WELL;?>
                </th>
                <th scope = "col">
                    <?php echo _STATUS; ?>
                </th>
                <th scope = "col">
                    <?php echo _IMG; ?>
                </th>
                <th scope = "col">
                    <?php echo _TAG;?>
                </th>
                <th scope = "col">
                    <?php echo _COMM_COUNT;?>
                </th>
                <th scope = "col">
                    <?php echo _VIEW;?>
                </th>
                <th scope = "col">
                    <?php echo _DATE; ?>
                </th>
                <th scope = "col">
                    <?php echo _LIKE_BTN; ?>
                </th>
                <th scope = "col">
                    <?php echo _DISLIKE_BTN; ?>
                </th>
                <th scope = "col"><input type="checkbox" id = "selectAll" ></th>
            </tr>
        </thead>
            
            <tbody>
                <?php
                    $order = " ";

                    //ORDER BY `posts`.`post_id` ASC
                    if(isset($_POST['sortSubmit'])){
                        $order = " ORDER BY ".$_POST['col']." ".$_POST['order'];
                    }
                    if(isset($_SESSION['user_id'])){
                        $user_id = $_SESSION['user_id'];
                    }
                    $sql = "SELECT * FROM(SELECT P.*, C.* FROM posts AS P LEFT JOIN categories AS C ";
                    $sql .= "ON P.post_cater_id = C.cat_id )AS T WHERE post_author_id = '{$user_id}'".$order;
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
                            
                                <td><a href="/Cocoding/post.php?p_id=<?php echo $id;?>&lang=<?php echo $_SESSION['lang'];?>" ><?php echo $title;?></a></td>
                                
                                <td><?php echo $cater;?></td>
                            
                                <td><?php echo $status;?></td>
                            
                                <td><img class="media-object" src="../image/<?php echo $img;?>" alt="" style="width:100px;height:100px;"></td>
                            
                                <td><?php fetch_tags($id, $connect); ?></td>
                            
                                <td>
                                    <a href="user_comments.php?pid=<?php echo $id; ?>&lang=<?php echo $_SESSION['lang'];?>">
                                        <?php echo $comment;?>
                                    </a>                                    
                                </td>

                                <td><?php echo $view;?></td>                            
                                <td><?php echo $date;?></td>
                                <td><?php echo $like;?></td>
                                <td><?php echo $dislike;?></td>

                                <td>                        
                                    <div class="form-check checkbox-lg">
                                        <input type="checkbox" class="form-check-input" name="select_ary[]" value = "<?php echo  $id;?>">                                                  
                                    </div>                        
                                </td>

                                <td>                        
                                    <a href="/Cocoding/user/user_posts.php?request=user_edit_posts&edit_id=<?php echo $id;?>&lang=<?php echo $_SESSION['lang']; ?>">
                                        <?php echo _EDIT_POST;?>
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
    $(document).ready(function(){
        $("#showSorting").click(function(){
            console.log("click");
            if($("#sortFilter").css("display") != "none"){
                console.log("block");
                $("#sortFilter").css('display','none');
            }
            else{
                console.log("none");
                $("#sortFilter").css('display','block');
            }            
        });

        $("#sortSubmit").click(function(){
            $("#sortFilter").css('display','none');
        });

        $("#selectAll").click(function(){
            if($("#selectAll").prop("checked")){
                console.log("check");                
                $("input[name='select_ary[]']").prop("checked", true);
            }
            else{
                $("input[name='select_ary[]']").prop("checked", false);
            }
        });
        
        $("#postSetSubmit").click(function(){
            if($("#postSetOption").val() == "Delete"){
                if(confirm("Really?")== true){
                    $.post("../../includes/function.php",$("#postStatus"),function(data, status){
                        $("#test").html(data);
                        console.log("delete");
                    });                                        
                }
                else{
                    console.log("Don't delete");
                }
            }
            else{
                console.log("Edit Status");
            }
        });
    });

</script>
