<!DOCTYPE html>
<?php
    include "includes/header.php";
?>

<body style="background-color:#fffefb;">
    <!-- Navigation -->
    <?php
        include "includes/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
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
                        if(isset($_GET['author'])){
                            $author = $_GET['author'];
                            $query = "SELECT * FROM(SELECT P.*, C.* FROM posts AS P LEFT JOIN categories AS C ";
                            $query .="ON P.post_cater_id = C.cat_id )AS T WHERE T.post_status = 'Published' AND T.post_author = '{$author}'";
                            
                            $result = mysqli_query($connect, $query);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    $num = mysqli_num_rows($result);

                                    
                                    echo"
                                        <p class='lead author_post_h'>
                                            {$num} "._POST_NUM." {$author} —            
                                        </p>
                                    ";

                                    while($row = mysqli_fetch_assoc($result)){
                                        
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        if($post_image == ""){
                                            $post_image = "img_not_availible.png";
                                        }
                                        $post_comment_count = comment_count($connect, $post_id);
                                        $post_view_count = $row['post_view_count'];
                                        $post_status = $row['post_status'];
                                        $post_cater_id = $row['post_cater_id'];
                                        $post_content = $row['post_content'];
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];

                    ?>
                                        <h1 class="page-header">
                                            <a href = "/Cocoding/post.php?p_id=<?php echo $post_id; ?>">
                                                <?php echo $post_title; ?>
                                            </a>                    
                                        </h1>

                                        <p class="h4">
                                            <?php echo _AUTHOR_POST." ".$post_author;?>
                                        </p>

                                        <p>
                                            <span class = "glyphicon glyphicon-time"></span> 
                                            
                                            <?php echo _DATE_POST." {$post_date}"; ?>
                                        </p>
                                        
                                        <p>
                                            <?php echo $post_view_count." "._VIEW_POST; ?> 
                                        </p>
                                        
                                         <p>
                                            <h5>
                                                <?php echo _CATER_WELL; ?> 
                                                <span class='badge badge-secondary'>
                                                    <a href = '/Cocoding/category/<?php echo $cat_id; ?>' style = 'color:white;'>
                                                        <?php echo $cat_title; ?>
                                                    </a>
                                                </span>
                                            </h5>
                                        </p>
                                        <p>
                                            <strong>
                                                <?php fetch_tags($post_id, $connect); ?>
                                            </strong>
                                        </p>

                                        <p>
                                            <img class = "img-responsive" src = "/Cocoding/image/<?php echo $post_image;?>" alt="<?php echo $post_image;?>">
                                        </p>
                                        
                                        <div style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; height: 200px; margin-bottom:10px;">
                                            <?php
                                                $post_content = base64_decode($post_content);
                                                echo $post_content;
                                            ?> 
                                        </div>
                                                        
                                        <div class="mt-4">
                                            <a class = "btn btn-primary" href = "/Cocoding/post.php?p_id=<?php echo $post_id; ?>&lang=<?php echo $_SESSION['lang']; ?>">
                                                <?php echo _READ_POST_BTN; ?> <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div> 
                                        <hr>
                    <?php

                                    }
                                }
                                else{
                                    
                                    echo "
                                            <h1 class='page-header'>
                                               Error
                                            </h1>
                                            <hr>
                                        ";
                                } 
                            }       
                        }
                    ?>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
                include "includes/sidebar.php";
            ?>
        <!-- /.row -->

        <hr>
        <?php
            include "includes/footer.php";
        ?>
    
</body>

</html>
