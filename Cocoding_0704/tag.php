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
                    if(isset($_GET['name'])){
                        $tag = $_GET['name'];   
                        if($tag == "C++"){
                            $tag = "CONCAT('C', '++')";
                        }            
                        else{
                            $tag = "'{$tag}'";
                        }             
                        
                        $query = "SELECT * FROM ".TAGS." WHERE tag_name = {$tag};";  
                        // echo $query; 
                        $result = mysqli_query($connect, $query);

                        if(!$result){
                            die("Failed, Because ".mysqli_error($connect));
                        }                        

                        $row_count = mysqli_num_rows($result);
                        
                        if($row_count == 0){
                            echo "<h2>No relative result</h2>";
                        }
                        else{                           
                            echo"
                                <p class='lead author_post_h'>
                                    {$row_count} correspond post of  
                                    <strong> # {$tag} </strong>                                     
                                </p>
                            ";                                                
                            while($tag_result = mysqli_fetch_assoc($result)){
                                $p_id = $tag_result['post_id'];
                                $sql2 = "SELECT * FROM ".POSTS." WHERE post_id = '{$p_id}';";
                                $r = mysqli_query($connect, $sql2);
                                if($r && mysqli_num_rows($r)>0){
                                    
                                    while($post = mysqli_fetch_assoc($r)){                                        
                                        $post_id = $post['post_id'];
                                        $post_title = $post['post_title'];
                                        $post_author = $post['post_author'];
                                        $post_date = $post['post_date'];
                                        $post_image = $post['post_image'];
                                        if($post_image == ""){
                                            $post_image = "img_not_availible.png";
                                        }
                                        $post_comment_count = comment_count($connect, $post_id);                                
                                        $post_view_count = $post['post_view_count'];
                                        $post_status = $post['post_status'];
                                        $post_cater_id = $post['post_cater_id'];
                                        $post_content = $post['post_content'];
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

                <p style='font-family:Rockwell;'>
                    <?php echo $post_view_count." "._VIEW_POST; ?> 
                </p>

                <p style='font-family:Rockwell;'>
                    <strong>
                        <?php fetch_tags($post_id, $connect); ?>
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
                
                                <a class = "btn btn-primary" href = "/Cocoding/post/<?php echo $post_id; ?>/">
                                    <?php echo _READ_POST_BTN; ?>
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                                <hr>
                            <?php       }

                                }
                                else{
                                    echo "Error";
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
