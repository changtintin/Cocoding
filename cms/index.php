<!DOCTYPE html>
<?php
include "includes/header.php";

?>


<body>
    <!-- Navigation -->
    <?php
        include "includes/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <script>
                function close_alert_edit() {
                    document.getElementById("alert_edit").innerHTML = " ";
                }
            </script>

            <?php
                query_msg_alert();
            ?>

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                if(isset($_GET['page'])){
                    $start = $_GET['page'] * 3;
                    echo "NEW ".$start;
                }
                else{
                    $start = 0;                    
                    $limit = 3;
                }


                $query1 = "SELECT COUNT(post_title) FROM ".POSTS_TABLE." WHERE post_status = 'Published';";
                $result1 = mysqli_query($connect, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)>0){
                       $post_count = mysqli_fetch_row($result1);
                       $post_nums = $post_count[0];
                       
                    }
                }

                
                $query = "SELECT * FROM " . POSTS_TABLE . " WHERE post_status = 'Published' LIMIT {$start},3";
                $result = mysqli_query($connect, $query);
                if($result){
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_view_count = $row['post_view_count'];
                        $post_status = $row['post_status'];
                        $post_cater_id = $row['post_cater_id'];
                        $post_content = $row['post_content'];
                    ?>
                        <div class="well" style="background-color:rgba(255, 254, 251, 0.8);padding-left: 30px;padding-right: 30px;padding-bottom: 30px;">

                            <h1 class="page-header">
                                <a href="post.php?p_id=<?php echo $post_id; ?>" ><?php echo $post_title; ?></a>
                            </h1>
                            

                            <p class="lead">
                                by 
                                <a href="author_post.php?author=<?php echo $post_author; ?>">
                                    <?php echo $post_author; ?>
                                </a>
                            </p>

                            <p>
                                <span class="glyphicon glyphicon-time"></span>
                                Posted on
                                <?php echo "{$post_date}"; ?>
                            </p>

                            <p style="font-family:'Rockwell';">
                                <?php echo $post_view_count ?> views
                            </p>

                            <p style="font-family:'Rockwell';">
                                <strong>
                                    <?php echo "# {$post_tags}"; ?>
                                </strong>
                            </p>

                            <div style='padding-bottom: 30px; padding-top: 10px;'>
                                <a href="post.php?p_id=<?php echo $post_id; ?>">
                                    <img class="img-responsive" src="image/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>">
                                </a>
                            </div>
                            
                            <div style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; height: 200px; margin-bottom:10px;">
                                <?php
                                    $post_content = base64_decode($post_content);
                                    echo $post_content;
                                ?> 
                            </div>
                            
                            <div class="mt-5">
                                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">
                                    Read More <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>

                    <?php
                    }
                }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "includes/sidebar.php";
            ?>
            <!-- /.row -->
            
            
            <ul class="pager">
                <li>
                    <a href='index.php?page=<?php if(isset($_GET['page']) && $_GET['page'] - 1 > 0){echo ($_GET['page'] -1);}else{ echo 0;}?>' style = 'font-family: Open Sans, sans-serif; font-weight: bold;'> 
                        <span class="glyphicon glyphicon-arrow-left"></span>
                    </a>
                </li>
                <?php
                    $total_page = ceil($post_nums/ 3);
                    for($i = 0; $i < $total_page; $i++){
                        
                        echo "
                            <li>
                                <a href='index.php?page={$i}' style = 'font-family: Open Sans, sans-serif; font-weight: bold;'> ".($i + 1)." </a>
                            </li>
                        ";
                    }
                ?>
                <li>
                    <a href='index.php?page=<?php if(isset($_GET['page']) && $_GET['page'] + 1 < $total_page){echo ($_GET['page'] + 1);}else{ echo 0;}?>' style = 'font-family: Open Sans, sans-serif; font-weight: bold;'> 
                        <span class="glyphicon glyphicon-arrow-right"></span>
                    </a>
                </li>
                
            </ul>
            
            <?php
                include "includes/footer.php";
            ?>

</body>
                
</html>
