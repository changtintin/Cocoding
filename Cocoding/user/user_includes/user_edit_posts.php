<script>
    function addTag(){ 
        const xhr = new XMLHttpRequest();
        let newTag = document.getElementById("newTag").value;        
        xhr.open('GET', '../includes/function.php?add_tags=ok&tag_name='+newTag);
        xhr.onload = function(){
            console.log(xhr.status); // 200
            const place = document.createElement("span");
            place.innerHTML= xhr.responseText;
            document.getElementById("add_confirm").appendChild(place);
        }         
        xhr.send();                                            
    }
</script>
<div class="row">
    <div class="col-lg-12" style="padding-top: 10px;">
        <h1>
            Edit Posts            
        </h1>
    </div>
</div>
<div class="row">
    
    <div class='col-lg-12'>
        <!-- enctype= Sending Different Form Data -->
        <form method="post" enctype="multipart/form-data">
            <script>
                function close_alert_edit(){
                    document.getElementById("alert_edit").innerHTML=" ";
                }
            </script>      

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
                
                <label for="title" class="col-sm-2 col-form-label">Post Title</label>
                <div class="col-sm-10">                    
                    <input type="text" class="form-control" name="title" id ="title" value = "<?php echo $result['post_title'];?>">
                </div>
            </div>

            <div class="form-group row ">
                <label for="author" class="col-sm-2 col-form-label">Post Author</label>
                <div class="col-sm-10">                    
                    <input type="text" class="form-control" name="author" id ="author" value = "<?php echo $result['post_author']; ?>" disabled="disabled">
                </div>
            </div>            
            
            <div class="form-group row">
                <label class=" col-sm-2 col-form-label  pt-0" for = "cater_n">Post Catergory ID</label>
                <div class="col-sm-10">
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
            </div>

            <div class="form-group row">
                <label for="img" class="col-sm-2 col-form-label" for="img">Post Image</label>
                <div class="col-sm-10" >
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
                <label for="author" class="col-sm-2 col-form-label">Add new tag</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" name="new_tag" id = "newTag">   
                        <span class = "input-group-btn">
                            <button class = "btn btn-primary" type = "button" name = "new_tag_submit" onclick = "addTag()">
                                <span class = "glyphicon glyphicon-plus"></span>
                            </button>
                        </span>         
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="tag_checkbox" class="col-sm-2 col-form-label">Post Tags</label>
                <div class="form-check checkbox-lg" id = "tag_checkbox">
                    <div class="col-sm-10" >                
                        <?php
                            checkbox_tags($connect);
                        ?>
                        <span id = "add_confirm"></span>
                    </div>
                </div> 
            </div>
            
            <div class="form-group row">    
                <label for="date" class="col-sm-2 col-form-label">Post Date</label>
                <div class="col-sm-10">                    
                    <input type="date" class="form-control" name="date" value = <?php echo $result['post_date']; ?>>
                </div>
            </div>

            <div class="form-group row mt-5">
                <label for="post_content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">                    
                    <textarea class="form-control" rows="10" name="post_content" id="summernote">
                        <?php echo $content; ?>
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="edit_post">Submit</button>
                </div>
            </div>
        </form>
    <?php           
                    user_edit_post($result['post_image'], $id);
        
                }   
            }
        };
    ?>      
    </div>
</div>


  