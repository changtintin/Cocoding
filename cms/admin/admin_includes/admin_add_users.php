

<!-- enctype= Sending Different Form Data -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="first_n" class="col-sm-2 col-form-label">Firstname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_n">
        </div>
    </div>

    <div class="form-group row">
        <label for="last_n" class="col-sm-2 col-form-label">Lastname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_n">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label  pt-0">Role</label>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="Subscriber">
                <label class="form-check-label" for="exampleRadios1">
                    Subscriber
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" value="Admin">
                <label class="form-check-label" for="exampleRadios1">
                    Admin
                </label>
            </div>
            
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password">
        </div>
    </div>

    
    
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success" name="add_user">Create</button>
        </div>
    </div>
</form>


