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
                        function close_alert_edit(){
                            document.getElementById("alert_edit").innerHTML=" ";
                        }
                    </script>

                    <?php
                        query_msg_alert();
                        if(isset($_GET['p_id'])){
                            $p_id = $_GET['p_id'];

                            increase_view_count($connect, $p_id);

                            $query = "SELECT * FROM ".POSTS_TABLE." WHERE post_id = {$p_id} AND post_status = 'Published';";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    if($row = mysqli_fetch_assoc($result)){
                                       
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
                                        $like = $row['post_like'];
                                        $dislike = $row['post_dislike'];
                                        $views = $row['post_view_count'];

                                        echo "    
                                                
                                                <h1 class='page-header'>
                                                    {$post_title}              
                                                </h1>

                                                <p class='lead'>
                                                    by 
                                                    <a href='author_post.php?author={$post_author}'>
                                                        {$post_author}
                                                    </a>
                                                </p>

                                                <p>
                                                    <span class = 'glyphicon glyphicon-time'></span> 
                                                    Posted on {$post_date}
                                                </p>

                                                <p style='font-family:Rockwell;'>
                                                    {$post_view_count} views
                                                </p>

                                                <p style='font-family:Rockwell;'>
                                                    <strong>
                                                    # {$post_tags}
                                                    </strong>
                                                </p>

                                                <div style='padding-bottom: 50px; padding-top: 40px;'>
                                                    <img class = 'img-responsive' src = 'image/{$post_image}' alt='{$post_image}'>
                                                </div>
                                            ";
                   
                                        $post_content = base64_decode($post_content);
                                        echo $post_content;

                                        echo
                                        "
                                        <div style='padding-top: 50px'> 
                                        ";
                                        include "comment.php";
                                        echo "    
                                        </div>
                                        ";

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
                
                <div style="padding-top: 15px">
                    <a class = "btn btn-primary " href = "#">
                        Read More <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
                
                
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
