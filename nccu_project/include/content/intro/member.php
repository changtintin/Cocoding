<div class ="row h1-title-container m-1">
    <div class="col-lg-1 col-sm-4" id="h1-title-decor"></div>
    <h1 class="col-lg-11 col-sm-8"> 中心簡介</h1>
</div>
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>
    <h3 class="col-lg-11 col-sm-8">中心成員</h3>
</div>
<?php
    foreach($zh_tw_json["member_pg"] as $key => $val){
        echo'   
            <div class="row h3-title-container m-5">
                <h4>'.$val.'</h4> 
            </div>
        ';
        if(!empty($zh_tw_json["member_name"][$key])){
            echo'<div class="row h3-title-container gy-5 justify-content-between">';
            if(is_array($zh_tw_json["member_name"][$key])){
                for($i = 0; $i < count($zh_tw_json["member_name"][$key]); $i++){
                    echo '
                        <div class="col-lg-4 col-md-6 col-sm-12  text-center">                    
                            <p class="fw-bold text-primary h6">'.$zh_tw_json["member_name"][$key][$i].'</p>
                            <div class="overflow-auto p-3">
                                <img src="img/member/'.$zh_tw_json["member_name"][$key][$i].'.jpeg" class = "member-img">
                            </div>                                     
                        </div>
                    ';
                }
            }
            else{
                echo '
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center">
                        <p class="fw-bold text-primary h6">'.$zh_tw_json["member_name"][$key].'</p>
                        <div class="overflow-auto p-3">
                            <img src="img/member/'.$zh_tw_json["member_name"][$key].'.jpeg" class = "member-img">
                        </div>
                    </div>
                ';
            }  
            echo '
                </div>
            ';              
        }
        else{
            echo'
                <div class="row h3-title-container my-3 justify-content-between">
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center text-secondary">
                        <i>待聘</i>
                    </div>
                </div>
            ';
        }
    }
?>




