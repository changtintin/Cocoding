<!-- enctype= Sending Different Form Data -->
<form method="post" enctype="multipart/form-data">
    <script>
        function close_alert_edit(){
            document.getElementById("alert_edit").innerHTML=" ";
        }
    </script>
    <div class="form-group row">
        <div class="col-sm-2">
            <h2>Edit Post</h2>
        </div>
        
    </div>

    <div class="form-group row" id = "alert_edit" >
        <script>
            function close_alert_edit(){
                document.getElementById("alert_edit").innerHTML=" ";
            }
        </script>

        <?php
            if(isset($_GET['edit_id'])){
                $id = $_GET['edit_id'];
                $sql = "SELECT * FROM ".POSTS. " WHERE post_id = '{$id}';";
                
                $q = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($q)>0){
                    if($result = mysqli_fetch_assoc($q)){  
                        $cater_id =  $result['post_cater_id'];   
                        $content = base64_decode($result['post_content']);
        ?>
       
    </div>

    <div class="form-group row ">
        <div class="col-sm">
            <label for="title" class="col-form-label">Post Title</label>
            <input type="text" class="form-control" name="title" id ="title" value = "<?php echo $result['post_title'];?>">
        </div>
       
        <div class="col-sm">
            <label for="author" class="col-form-label">Post Author</label>
            <input type="text" class="form-control" name="author" id ="author" value = "<?php echo $result['post_author']; ?>">
        </div>
    </div>

    
    <div class="form-group row">
       
        <div class="col-sm">
            <label class="col-form-label  pt-0" for = "cater_n">Post Catergory ID</label>
            <select multiple class="form-control"name = "cater_n">
                <?php
                    
                    if($connect){
                        $sql = "SELECT * FROM ".CATER;
                        $query = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($query) > 0){
                            while($row = mysqli_fetch_assoc($query)){
                                $cat_id = $row['cat_id'];
                                $name = $row['cat_title'];
                ?>
                        <option <?php if($cat_id == $cater_id){echo "selected = 'selected'"; }?>>
                            <?php echo $name; ?>
                        </option>    
                <?php                
                            }
                        }
                    }
                ?>
                
            </select>
        </div>
        
        <div class="col-sm">
            <label class="col-form-label  pt-0" for = "status">Post Status</label>
            <select multiple class="form-control" name = "status" id ="status">
                <option value = "Draft" <?php if($result['post_status'] == "Draft"){echo "selected = 'selected'";}?>>
                    Draft
                </option>    
                <option value = "Published"  <?php if($result['post_status'] == "Published"){echo "selected = 'selected'";}?>>
                    Published
                </option>    
                <option value = "Spam" <?php if($result['post_status'] == "Spam"){echo "selected = 'selected'";}?>>
                    Spam
                </option>   
            </select>
        </div>
    </div>

   

   
    <div class="form-group row">
        <div class="col-sm" >
            <label for="img" class="col-form-label" for="img">Post Image</label>
            <input type='file' class="form-control-file" accept='image/*' onchange='openFile(event)' name ="img" id = "img"><br>
            <img class="media-object " id='output' style="width:600px; height:300px;">
            <script>
                var openFile = function(event) {
                    var input = event.target;

                    var reader = new FileReader();
                    reader.onload = function(){
                    var dataURL = reader.result;
                    var output = document.getElementById('output');
                    output.src = dataURL;
                    };
                    reader.readAsDataURL(input.files[0]);
                };
            </script>
        </div>
    </div>                
    

    <div class="form-group row">
        
        
        <div class="col-sm">
            <label for="tag" class="col-form-label">Post Tags</label>
            <input type="text" class="form-control" name="tag" value = "<?php echo $result['post_tags']; ?>">
        </div>

        
        <div class="col-sm">
            <label for="date" class="col-form-label">Post Date</label>
            <input type="date" class="form-control" name="date" value = <?php echo $result['post_date']; ?>>
        </div>
    </div>

    <div class="form-group row mt-5">
        
        <div class="col-sm-10">
            <label for="post_content" class="col-form-label">Content</label>
            <textarea class="form-control" rows="10" name="post_content" id="summernote">
                <?php echo $content; ?>
            </textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <label for="comment" class="col-form-label">Post Comment Count</label>
            <input type="text" class="form-control" name="comment" value = <?php echo $result['post_comment_count']; ?>>
        </div>
    </div>

    <div class="form-group row">
        
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="edit_post">Submit</button>
        </div>
    </div>
</form>
    

    <?php           
                    edit_post($result['post_image'], $id);
        
                }   
            }
        };
    ?>      

  