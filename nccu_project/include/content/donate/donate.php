<!-- Donate -->
<div class="row h1-title-container m-1">
    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" id="h1-title-decor"></div>
    <h1 class="col-lg-11 col-md-10 col-sm-6 col-xs-6">
        <?php echo $zh_tw_json['navbar']['donate']; ?>
    </h1>
</div><!-- ./ Donate -->
<!-- Donate Pages -->
<div class="row h3-title-container m-5 justify-content-between mt-3">
    <?php
        foreach($zh_tw_json["donate"] as $key => $val){
            
            echo'
                <div class="col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 py-3 text-center  opacity-75 map1">
                    <div class="p-1">
                        <div class="ratio ratio-4x3">
                            <img allowfullscreen src="./img/donate/'.$key.'.jpeg">
                        </div>    
                    </div> 
                    <h5 class="pt-3">
                    '.$zh_tw_json["donate"][$key][0].'
                    </h5>     
                    <a href="'.$zh_tw_json["donate"][$key][1].'" target="_blank">
                        <button class="btn btn-outline-primary btn-lg mt-3">                        
                            '.$zh_tw_json["donate_pg"]["go_to_pg"].'                        
                        </button>   
                    </a>              
                </div>   
            
            ';
        }
    ?>
</div><!-- ./ Donate Pages-->

