
<?php
    if( empty(session_id()) && !headers_sent()){
        session_start();
    }
?>
<div class="jumbotron text-center banner_img"> 
    <div class="banner_content"> 
        <div class="banner-header"></div>          
        
        <img src="image/cocoding_logo-removebg.png" alt="logo" >

        <p style="font-size: small;">
            Cocoding — Coding  Together 
            <br> Subscribe our newsletter &
            Consider Another way to learn
        </p>

        <form class="form-inline">
            <div class="input-group">
                <input type="email" class="form-control" size="50" placeholder="Email Address" required>
                <div class="input-group-btn ">
                    <button type="button" class="btn btn-primary" style="font-size: small;">Subscribe</button>
                </div>
            </div>
        </form>
    </div>
</div>