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
                $query = "SELECT * FROM " . POSTS_TABLE . " WHERE post_status = 'Published'";
                $result = mysqli_query($connect, $query);

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
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php
            include "includes/sidebar.php";
            ?>
            <!-- /.row -->

            
            <?php
            include "includes/footer.php";
            ?>

</body>
                
</html>
