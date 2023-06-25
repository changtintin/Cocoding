<h4>Login</h4>
<div class = "form-group form-group-sm">                
    <input type = "text" class="form-control" name = "username_login" placeholder="Username" autocomplete="off">                    
</div>

<div class = "input-group input-group-sm">                
    <input type = "password" class="form-control" name = "password_login" placeholder="Password" autocomplete="off" id = "password_in">   
    <span class = "input-group-btn">
        <button class = "btn btn-success" id = "show_password" type = "button" >
            <span class ="glyphicon glyphicon-eye-close" id = "show_icon"></span>
        </button>
        <button class = "btn btn-primary" type = "submit" name = "login_submit" style="font-family: Open Sans, sans-serif;">
            Go
            <span class="glyphicon glyphicon-log-in"></span> 
        </button>
    </span> 
</div>

<div style="padding-top: 10px;"> 
    <div class = "form-group text-right">  
        <a href="/Cocoding/registration" style="font-size: small;">
            Create an account
            <span class="glyphicon glyphicon-registration-mark"></span>
        </a>
    </div>
    <div class = "form-group text-right">  
        <a href="/Cocoding/forgot.php?forgot=1" style="font-size: small;">
           <u> Forgot your password?</u>
        </a>
    </div>
</div>

<script>
        var show = document.getElementById("password_in");
        var icon = document.getElementById("show_icon");
        document.getElementById("show_password").onclick= function(){
            if(show.type == "text"){
                show.type="password";
                icon.className="glyphicon glyphicon-eye-close";
                
            }
            else{
                show.type="text";
                icon.className="glyphicon glyphicon-eye-open";
            }
        }

</script>

