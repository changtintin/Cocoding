<!DOCTYPE html>
<html lang="en">
<?php include "./include/header.php"; ?>
<!-- Fontawesome Icons -->
<script src="https://kit.fontawesome.com/a0b3a023f8.js" crossorigin="anonymous"></script>
<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<body class="container-fluid" >    
    <button class="btn btn-sm btn-secondary m-3 rounded-circle" id="scrollspyTop" onclick="toTop()">
        <i class="material-icons">arrow_upward</i>
        <br>
        <b>TOP</b>
    </button>

    <!-- Depart-logo -->
    <div class="row bg-primary">
        <a href="index.php">    
            <img src="./img/depart-logo.png" class="depart-logo">
        </a>
    </div><!-- ./ Depart-logo -->

    <div class="row bg-primary">  
        <?php include "main.php"; ?>        
        <?php include "include/nav/nav.php"; ?>  
    </div>
    
        <!-- Read the Language File -->
        <!-- https://ithelp.ithome.com.tw/questions/10186432 -->
        <!-- https://jokes168.pixnet.net/blog/post/378967367 -->
              
    <?php 
        if(!empty($_GET)){
            include "include/breadCrumb.php"; 
        }            
    ?>       
    <!-- Route to Pages -->
        
    <?php include "include/route.php"; ?>        
    
    <!-- Footer -->
    <div class="row pt-5">        
        <?php include "./include/footer.php"; ?>
    </div><!-- ./ Footer -->
    <script src="js/script.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>