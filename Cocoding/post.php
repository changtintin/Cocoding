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
                            $query = "SELECT * FROM(SELECT P.*, C.* FROM posts AS P LEFT JOIN categories AS C ";
                            $query .="ON P.post_cater_id = C.cat_id )AS T WHERE T.post_id = '{$p_id}' AND T.post_status = 'Published'";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    if($row = mysqli_fetch_assoc($result)){                                       
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
            
                                        // if there is no pic stored, show the default pic
                                        if($post_image == ""){
                                            $post_image = "img_not_availible.png";
                                        }
                                        $cate_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
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

                                            <p class='h4'>
                                                "._AUTHOR_POST."
                                                <a href='/Cocoding/author_post.php?author={$post_author}&lang=".$_SESSION['lang']."'>
                                                    {$post_author}
                                                </a>
                                            </p>

                                            <p>
                                                <span class = 'glyphicon glyphicon-time'></span> 
                                                ". _DATE_POST.":  {$post_date}"."
                                            </p>
                                            
                                            <p>
                                                <h5>
                                                    "._CATER_WELL.":  
                                                    <span class='badge badge-secondary'>
                                                        <a href = '/Cocoding/category.php?cat={$cat_id}&lang={$_SESSION['lang']}' style = 'color:white;'>
                                                            {$cate_title}
                                                        </a>
                                                    </span>
                                                </h5>
                                            </p>
                                            
                                            <p style='font-family:Rockwell;'>
                                                {$post_view_count} "._VIEW_POST."
                                            </p>

                                            <p style='font-family:Rockwell;'>
                                                <strong>
                                            ";    
                                            fetch_tags($post_id, $connect);
                                            
                                            echo"
                                                </strong>
                                            </p>

                                            <div style='padding-bottom: 50px; padding-top: 40px;'>
                                                <img class = 'img-responsive' src = '/Cocoding/image/{$post_image}' alt='{$post_image}'>
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
                                            The article you are trying to access is currently undergoing review and awaiting approval.
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

        <?php
            include "includes/footer.php";
        ?>
    
</body>

</html>