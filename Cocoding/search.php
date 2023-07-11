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
                                                       
                            $query = "SELECT * FROM ".TAGS." WHERE tag_name LIKE '%{$search_input}%';";
                           
                            $result = mysqli_query($connect, $query);
                            if(!$result)
                                die("Failed, Because ".mysqli_error($connect));

                            $row_count = mysqli_num_rows($result);
                            
                            if($row_count == 0){
                                echo "<h2>"._NO_SEARCH."</h2>";
                            }
                            else{

                                echo"
                                    <p class='lead author_post_h'>
                                        {$row_count} "._SEARCH_RESULT." 
                                        <strong> \"{$search_input}\" </strong>
                                        —          
                                    </p>
                                ";
                            }
                                
                            while($r = mysqli_fetch_assoc($result)){
                                $p_id = $r['post_id'];
                                $sql2 = "SELECT * FROM(SELECT P.*, C.* FROM posts AS P LEFT JOIN categories AS C ";
                                $sql2 .="ON P.post_cater_id = C.cat_id )AS T WHERE T.post_id = '{$p_id}' AND T.post_status = 'Published'";   
                                $r = mysqli_query($connect, $sql2);
                                if($r && mysqli_num_rows($r)>0){
                                while($row = mysqli_fetch_assoc($r)){ 
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
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                ?>
                                
                
                <h1 class="page-header">
                    <a href = "/Cocoding/post.php?p_id=<?php echo $post_id; ?>&lang=<?php echo $_SESSION['lang']; ?>">
                    <?php echo $post_title; ?>
                </a>                    
                </h1>

                <p class="lead">
                    <?php echo _AUTHOR_POST; ?>  
                    <a href="/Cocoding/author_post.php?author=<?php echo $post_author; ?>&lang=<?php echo $_SESSION['lang']; ?>">
                        <?php echo $post_author; ?>
                    </a>
                </p>

                <p>
                    <span class = "glyphicon glyphicon-time"></span> 
                    <?php echo _DATE_POST.": {$post_date}"; ?>
                </p>
                
                <p>
                    <h5>
                        <?php echo _CATER_WELL; ?>:  
                        <span class='badge badge-secondary'>
                            <a href = '/Cocoding/category.php?cat=<?php echo $cat_id; ?>&lang=<?php echo $_SESSION['lang']; ?>' style = 'color:white;'>
                                <?php echo $cat_title; ?>
                            </a>
                        </span>
                    </h5>
                </p>

                <p style='font-family:Rockwell;'>
                    <?php echo $post_view_count." "._VIEW_POST; ?> 
                </p>

                <p style='font-family:Rockwell;'>
                    <strong>
                        <?php fetch_tags($post_id, $connect) ?>
                    </strong>
                </p>


                <div style='padding-bottom: 50px;'>
                    <img class = "img-responsive" src = "/Cocoding/image/<?php echo $post_image;?>" alt="<?php echo $post_image;?>">
                </div>
                                <p>
                                    <div style="overflow:hidden; white-space: nowrap; text-overflow: ellipsis; height: 200px; margin-bottom:10px;">
                                        <?php
                                            $post_content = base64_decode($post_content);
                                            echo $post_content;
                                        ?> 
                                    </div>
                                </p>
                
                                <a class = "btn btn-primary" href = "/Cocoding/post.php?p_id=<?php echo $post_id; ?>&lang=<?php echo $_SESSION['lang']; ?>">
                                    <?php echo _READ_POST_BTN; ?>
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <hr>
                            <?php }
                                }
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
