<form method="post">    
    <div class="text-right" style="padding-bottom: 20px;">
        
        <div class="btn-group dropup mr-3">
            <div class="btn-group mr-3" role="group">
                <select class="btn-group form-control" id="exampleFormControlSelect1" name = "user_setting">
                    <option selected disabled >Setting</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>
                    <option value="Delete"> Delete</option>
                </select>
            </div>
            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary" name="user_setting_submit">
                    Apply
                </button>
            </div>
        </div>
                
        <div class="btn-group mr-3 " role="group">
            
            <div class="btn-group mr-3" role="group" >
                <button type="submit" class="btn btn-primary float-right" name ="select_all">
                    Select All
                </button>
            </div>

            <div class="btn-group mr-3" role="group">
                <button type="submit" class="btn btn-primary float-right" name ="cancel_all">
                    Cancel
                </button>
            </div>
            
        </div>
    </div>

    <table class="table table-bordered table-hover" id = "posts_table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope = "col" style="background-color: #dad8d8;">Select</th>
            </tr>
        </thead>

        
        <tbody>
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
                $sql = "SELECT * FROM ".USERS;
                $query = mysqli_query($connect, $sql);
                if(mysqli_num_rows($query) > 0){
                    while($row = mysqli_fetch_assoc($query)){
                        
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $first_n = $row['user_firstname'];
                        $last_n = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_role = $row['user_role'];
            ?>
                        <tr>
                            <th scope="row"><?php echo $user_id;?></th>                         
                            <td><?php echo $username;?></td>                        
                            <td><?php echo $first_n;?></td>
                            <td><?php echo $last_n;?></td>                        
                            <td><?php echo $user_email;?></td>
                            <td><?php echo $user_role;?></td>
                            

                            <td style="background-color: #dad8d8;">                        
                                <div class="form-check checkbox-lg">
                                    <input type="checkbox" class="form-check-input" name="select_ary[]" value = "<?php echo  $user_id;?>" <?php select_all(); ?>>                                                  
                                </div>                        
                            </td>

                            <td>                        
                                <a href="./admin_users.php?source=admin_edit_users&edit_id=<?php echo  $user_id;?>">
                                    Edit
                                </a>                   
                            </td>

                        </tr>
            <?php
                    }
                }                        
            ?>
            
        </tbody>
    </table>
</form>

<?php
    if(isset($_POST['user_setting_submit'])){
        if($_POST['user_setting']=='Delete'){
            delete_users();
        }
        else if($_POST['user_setting']=='Subscriber'){
            switch_user_role($_POST['user_setting']);
        }
        else if($_POST['user_setting']=='Admin'){
            switch_user_role($_POST['user_setting']);
        }
    }
   
    
?>
