<div class ="row h1-title-container m-1">
    <div class="col-lg-1 col-sm-4" id="h1-title-decor"></div>
    <h1 class="col-lg-11 col-sm-8"> 中心簡介</h1>
</div>
<?php
    foreach($zh_tw_json["intro_sec_theme"] as $key => $val){
        echo '
            <div class ="row h3-title-container m-5">
                <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>            
                <h3 class="col-lg-11 col-sm-8">'.$val.'</h3>            
            </div>
        ';
    }
?>