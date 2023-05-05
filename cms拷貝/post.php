<!DOCTYPE html>
<?php
    include "includes/header.php";
?>

<body class="post_body">
    <!-- Navigation -->
    <?php
        include "includes/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container post-container">
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
                        if(isset($_GET['p_id'])){
                            $p_id = $_GET['p_id'];

                            increase_view_count($connect, $p_id);

                            $query = "SELECT * FROM ".POSTS." WHERE post_id = {$p_id} AND post_status = 'Published';";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    if($row = mysqli_fetch_assoc($result)){
                                       
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        
                                        $post_comment_count = comment_count($connect, $post_id);
                                        $post_view_count = $row['post_view_count'];
                                        $post_status = $row['post_status'];
                                        $post_cater_id = $row['post_cater_id'];
                                        $post_content = $row['post_content'];
                                        $like = $row['post_like'];
                                        $dislike = $row['post_dislike'];
                                        $views = $row['post_view_count'];

                                        echo "    
                                                
                                                <div class='post_header'>
                                                    {$post_title}              
                                                </div>

                                                <p class='post-author'>
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
                                                ";    
                                                fetch_tags($post_id, $connect);
                                                
                                                echo"
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
                                            <h1 class='post-header'>
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