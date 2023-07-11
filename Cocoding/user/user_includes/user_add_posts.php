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

<!-- enctype= Sending Different Form Data -->
<form method="post" enctype="multipart/form-data">

    <div class="form-group row">        
        <label for="title" class="col-sm-2 col-form-label">
            <?php echo _POST_TITLE;?>
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label  pt-0" for = "cater_id">
            <?php echo _CATER_WELL; ?>
        </label>
        <div class="col-sm-10">
            <select multiple class="form-control" name = "cater_id">
                <?php
                    if($connect){
                        $sql = "SELECT * FROM ".CATER;
                        $query = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($query) > 0){
                            while($row = mysqli_fetch_assoc($query)){
                                $id = $row['cat_id'];
                                $name = $row['cat_title'];
                ?>
                        <option value = "<?php echo $id;?>"><?php echo $name;?></option>    
                <?php                
                            }
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    

    <div class="form-group row">
        <label for="author" class="col-sm-2 col-form-label">
            <?php echo _AUTHOR_POST; ?>
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="author" value = <?php echo $_SESSION['username']; ?> disabled="disabled">            
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label  pt-0" for = "status">
            <?php echo _STATUS;?>
        </label>
        <div class="col-sm-10">
            <select multiple class="form-control" name = "status" id ="status">
                <option value = "Draft" selected="selected">
                    <?php echo _STATUS_DFT; ?>
                </option>    
                <option disabled="disabled">
                    <?php echo _STATUS_PUB; ?>
                </option>    
                <option disabled="disabled">
                    <?php echo _STATUS_SPM; ?>
                </option>   
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">
            <?php echo _IMG;?>
        </label>
        <div class="col-sm-10" >
            <input type="file" class="form-control-file" name ="img">
        </div>
    </div>
    
    <div class="form-group row">
        <label for="summernote" class="col-sm-2 col-form-label">
            <?php echo _POST_CONTENT; ?>
        </label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="40" name="post_content"  id="summernote"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="author" class="col-sm-2 col-form-label">
            <?php echo _ADD_TAG;?>
        </label>
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
        <label for="tag_checkbox" class="col-sm-2 col-form-label">
            <?php echo _TAG; ?>
        </label>
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
        <label for="date" class="col-sm-2 col-form-label">
            <?php echo _DATE_POST; ?>
        </label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="date">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" name="create_post">
                <?php echo _APPLY; ?>
            </button>
        </div>
    </div>

</form>

<?php
    
    add_posts("user");
?>
