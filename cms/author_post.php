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
                        if(isset($_GET['author'])){
                            $author = $_GET['author'];
                            $query = "SELECT * FROM ".POSTS." WHERE post_status = 'Published' AND post_author = '{$author}';";
                            $result = mysqli_query($connect, $query);
                            if($result){
                                if(mysqli_num_rows($result) > 0){
                                    $num = mysqli_num_rows($result);

                                    if($num > 1){
                                        $be_v = "are";
                                    }
                                    else{
                                        $be_v = "is";
                                    }
                                    
                                    echo"
                                        <p class='lead author_post_h'>
                                            Here {$be_v} {$num} articles written by {$author} —            
                                        </p>
                                    ";

                                    while($row = mysqli_fetch_assoc($result)){
                                        
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

                    ?>
                                        <h1 class="page-header">
                                            <a href = "post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>                    
                                        </h1>

                                        <p class="lead">
                                            by <?php echo $post_author;?>
                                        </p>

                                        <p>
                                            <span class = "glyphicon glyphicon-time"></span> 
                                            Posted on 
                                            <?php echo "{$post_date}"; ?>
                                        </p>
                                        
                                        <p>
                                            <?php echo $post_view_count ?> views
                                        </p>
                                        <p>
                                            <strong>
                                                <?php fetch_tags($post_id, $connect);; ?>
                                            </strong>
                                        </p>

                                        <p>
                                            <img class = "img-responsive" src = "image/<?php echo $post_image;?>" alt="<?php echo $post_image;?>">
                                        </p>
                                        
                                        <div style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; height: 200px; margin-bottom:10px;">
                                            <?php
                                                $post_content = base64_decode($post_content);
                                                echo $post_content;
                                            ?> 
                                        </div>
                                                        
                                        <div class="mt-4">
                                            <a class = "btn btn-primary" href = "post.php?p_id=<?php echo $post_id; ?>">
                                                Read More <span class="glyphicon glyphicon-chevron-right"></span>
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
