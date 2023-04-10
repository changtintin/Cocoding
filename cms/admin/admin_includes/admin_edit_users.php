<!-- enctype= Sending Different Form Data -->
<form method="post" enctype="multipart/form-data">
    <script>
        function close_alert_edit(){
            document.getElementById("alert_edit").innerHTML=" ";
        }
    </script>
    <div class="form-group row">
        <div class="col-sm-2">
            <h2>Edit User Info</h2>
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
                $sql = "SELECT * FROM ".USERS_TABLE. " WHERE user_id = '{$id}';";
                
                $q = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($q) > 0){
                    if($result = mysqli_fetch_assoc($q)){  
                        $user_id =  $result['user_id'];   
        ?>
    </div>

    <div class="form-group row">
        <label for="first_n" class="col-sm-2 col-form-label">Firstname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_n" value = "<?php echo $result['user_firstname'];?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="last_n" class="col-sm-2 col-form-label">Lastname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_n" value = "<?php echo $result['user_lastname'];?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" value = "<?php echo $result['username'];?>">
        </div>
    </div>
   
    <div class="form-group row">
        <label class="col-sm-2 col-form-label  pt-0">Role</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="Admin" <?php if($result['user_role'] == "Admin"){echo " checked";}?>>
                <label class="form-check-label" for="exampleRadios1">
                    Admin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="Subscriber" <?php if($result['user_role'] == "Subscriber"){echo " checked";}?>>
                <label class="form-check-label" for="exampleRadios1">
                    Subscriber
                </label>
            </div>
        </div>
    </div>

    <!-- <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Post Image</label>
        <div class="col-sm-10" >
            <input type='file' class="form-control-file" accept='image/*' onchange='openFile(event)' name ="img"><br>
            <img class="media-object" id='output' style="width:250px;height:100px;">
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
    </div> -->

    
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value = "<?php echo $result['user_email'];?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password" value = "<?php echo $result['user_password'];?>">
        </div>
    </div>
    

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" name="edit_user">Submit</button>
        </div>
    </div>
</form>
    

    <?php           
                    edit_users($user_id);
                }   
            }
        };
    ?>      

  