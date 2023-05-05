<!DOCTYPE html>
<?php
    include "includes/header.php";
?>

<body>
    <!-- Navigation -->
    <?php
        include "includes/nav.php";
        include "includes/banner.php";
    ?>
        
    <!-- Page Content -->
    <div class="container">
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

            <!-- Blog Entries Column -->
            <div class="col-md-8">  
                <?php
                    query_msg_alert();
                    
                    $post_per_page = 3;
                    $post_start = 0;
                    

                    $sql = "SELECT * FROM ".POSTS;
                    $q = mysqli_query($connect, $sql);
                    
                    if(!$q){
                        echo mysqli_error($connect, $q);
                    }
                    if(mysqli_num_rows($q) > 0){
                        $post_num = mysqli_num_rows($q);
                    }
                    
                    $limit = $post_num / $post_per_page;
                    

                    if(isset($_GET['cur_page'])){
                        $cur_page = $_GET['cur_page'];  
                        $post_start = $cur_page * $post_per_page;  

                        if($post_start < 0 || $post_start > $post_num - $post_per_page){
                            $post_start = 0;
                        }
                    }
                    else{
                        $cur_page = 0;
                    }
                    
                    

                    $query = "SELECT * FROM " . POSTS . " WHERE post_status = 'Published' LIMIT {$post_start}, {$post_per_page}; ";
                    // echo $query;
                    $result = mysqli_query($connect, $query);
                    if(!$result){
                        echo "Error";
                    }
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
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
                    
                        <div class=" ">                        

                            <h1 class="page-header">
                                <a href="post.php?p_id=<?php echo $post_id; ?>" ><?php echo $post_title; ?></a>
                            </h1>
                            

                            <p class="lead" style="font-size: large;">
                                by 
                                <a href="author_post.php?author=<?php echo $post_author; ?>" >
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
                                    <?php fetch_tags($post_id, $connect); ?>
                                </strong>
                            </p>

                            <div style='padding-bottom: 30px; padding-top: 10px;'>
                                <a href="post.php?p_id=<?php echo $post_id; ?>">
                                    <img class="img-responsive" src="image/<?php echo $post_image; ?>" alt="<?php echo $post_image; ?>">
                                </a>
                            </div>
                            
                            <div class="post_content_preview">
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

                            <hr class="homepage_hr">
                        </div>

                    <?php

                        }
                    }
                    ?>


                <ul class = "pager">                    
                    <?php                         
                        if($limit != 0){
                            
                            if($cur_page >= $limit){
                                $cur_page = 0;
                            }
                            else if(($cur_page - 1) <  -1){
                                $cur_page = 0;
                            }
                            

                            echo '
                                <li>
                                    <a href="index.php?cur_page='.($cur_page - 1).'">
                                        <span class = "glyphicon glyphicon-arrow-left"></span>
                                    </a>
                                </li>
                            ';
                        
                            for($i = 0; $i < $limit - 1; $i++){
                                echo '
                                <li>
                                    <a href="index.php?cur_page='.$i.'">'.($i + 1).'</a>
                                </li>
                                ';
                            }
                                                        
                            echo '
                                <li>
                                    <a href="index.php?cur_page='.($cur_page + 1).'">
                                        <span class = "glyphicon glyphicon-arrow-right"></span>
                                    </a>
                                </li>
                            ';
                        }
                    ?>
                </ul>                
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
