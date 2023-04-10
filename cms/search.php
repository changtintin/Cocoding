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
                <?php
                    if(isset($_POST['search_submit'])){
                        $search_input = $_POST['search_input'];
                        if($search_input == ''){
                            echo "Please try again!<br>";
                        }
                        else{
                            $tag = "post_tags";
                            $title = "post_title";
                            $query = "SELECT * FROM ".POSTS_TABLE." WHERE {$tag} LIKE '%{$search_input}%' OR {$title} LIKE '%{$search_input}%';";
                           
                            $result = mysqli_query($connect, $query);
                            if(!$result)
                                die("Failed, Because ".mysqli_error($connect));

                            $row_count = mysqli_num_rows($result);
                            
                            if($row_count == 0){
                                echo "<h2>No relative result</h2>";
                            }
                                
                            while($row = mysqli_fetch_assoc($result)){
                                
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
                                
                
                <h1 class="page-header">
                    <a href = "post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>                    
                </h1>

                <p class="lead">
                    by 
                    <a href="author_post.php?author=<?php echo $post_author; ?>">
                        <?php echo $post_author; ?>
                    </a>
                </p>

                <p>
                    <span class = "glyphicon glyphicon-time"></span> 
                    Posted on 
                    <?php echo "{$post_date}"; ?>
                </p>

                <p style='font-family:Rockwell;'>
                    <?php echo $post_view_count ?> views
                </p>

                <p style='font-family:Rockwell;'>
                    <strong>
                        <?php echo "# {$post_tags}"; ?>
                    </strong>
                </p>


                <div style='padding-bottom: 50px;'>
                    <img class = "img-responsive" src = "image/<?php echo $post_image;?>" alt="<?php echo $post_image;?>">
                </div>
                
                                <p>
                                    <div style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; height: 200px; margin-bottom:10px;">
                                        <?php
                                            $post_content = base64_decode($post_content);
                                            echo $post_content;
                                        ?> 
                                    </div>
                                </p>
                
                                <a class = "btn btn-primary" href = "post.php?p_id=<?php echo $post_id; ?>">
                                    Read More <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <hr>
                            <?php }
                        }
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
