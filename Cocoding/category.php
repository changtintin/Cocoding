<!DOCTYPE html>
<?php
    include "includes/header.php";
?>

<body style="background-color:#fffefb;">
    <!-- Navigation -->
    <?php
        include "includes/nav.php";
        include "includes/banner.php";
    ?>
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
    
    <!-- Page Content -->
   

    <div class="container">
        <div class="row">
            <?php
                if(isset($_GET['cat'])){
                    $c_id = $_GET['cat'];
                    $query = "SELECT * FROM ".POSTS." WHERE post_cater_id = '{$c_id}' AND post_status = 'Published';";
                    $result = mysqli_query($connect, $query);
                    
                    echo '<div id = "alert_edit" >';
                    query_confirm($result);
                    echo '<div>';
                    if(mysqli_num_rows($result) > 0){
                        $num = mysqli_num_rows($result);

                        $sql2 = "SELECT * FROM ".CATER." WHERE cat_id = '{$c_id}'";
                        $r = mysqli_query($connect, $sql2);

                        if($r){
                            if(mysqli_num_rows($r)>0){
                                if($num > 1){
                                    $be_v = "are";
                                }
                                else{
                                    $be_v = "is";
                                }
                                $name = mysqli_fetch_row($r);

                                echo"
                                    <p class='lead author_post_h'>
                                        Here {$be_v} {$num} articles in Category 
                                        <strong> \"{$name[1]}\" </strong>
                                        —          
                                    </p>
                                ";
                            }
                        }
                        
            ?>
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    
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
                        <?php fetch_tags($post_id, $connect, "post"); ?>
                    </strong>
                </p>


                <div style='padding-bottom: 50px; padding-top: 40px;'>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                        <img class = "img-responsive" src = "image/<?php echo $post_image;?>" alt="<?php echo $post_image;?>">
                    </a>
                </div>

                <p>
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
                            echo"
                                <div class='col-md-8'>
                                    <p class = 'lead'>
                                        Sorry, No Article in this Catergory now
                                        <br>
                                        Here are other categories......            
                                    </p>
                                    <ol class='list-group list-group-numbered' style='font: size 500px; font-family: Helvetica, Arial, sans-serif;'>
                            ";
                            global $connect;

                            $q = "SELECT * FROM ". CATER;
                            $select_cater_sidebar = mysqli_query($connect, $q);
                            if($select_cater_sidebar){
                                while($fetch_row = mysqli_fetch_assoc($select_cater_sidebar)){
                                    $title = $fetch_row['cat_title'];
                                    $id = $fetch_row['cat_id'];
                                    echo "
                                        <li class='list-group-item'>
                                            <a href='category.php?cat={$id}'> {$title} </a>
                                        </li>
                                    ";
                                }
                            }
                             
                            echo"
                                    </ol>
                                    <a class = 'btn btn-primary' href = 'index.php'>
                                        Back to the home page <span class='glyphicon glyphicon-chevron-right'></span>
                                    </a>
                                </div>
                            ";
                        }
                    ?>
                </p>
                
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
