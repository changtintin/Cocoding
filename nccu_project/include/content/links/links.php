<!-- Donate -->
<div class="row h1-title-container m-1">
    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-3" id="h1-title-decor"></div>
    <h1 class="col-lg-11 col-md-10 col-sm-6 col-xs-6">
        <?php echo $zh_tw_json['navbar']['links']; ?>
    </h1>
</div><!-- ./ Donate -->
<!-- Teach Pages -->
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json["implement_pg"]["teach"];?>
    </h3>
</div>
<div class="row h3-title-container m-5 justify-content-between mt-3">
    <?php
        foreach($zh_tw_json["implement_pg"]["teach_content"] as $key => $val){
            echo'
                <div class="col-xs-11 col-sm-11 col-md-5 col-lg-5 col-xl-5 col-xxl-5 m-2 py-3 text-center opacity-75 map1">
            ';
            foreach($zh_tw_json["implement_pg"]["teach_content"][$key] as $sec_key => $sec_val){
                
                if($sec_key == "title"){
                    // title
                    echo'                        
                        <div class="p-1">
                            <div class="ratio ratio-4x3">
                                <img allowfullscreen src="./img/implement/'.$key.'.jpeg">
                            </div>    
                        </div> 
                        <h5 class="pt-3">
                        '.$sec_val.'
                        </h5>                        
                    ';  
                }
                else{
                    foreach($zh_tw_json["implement_pg"]["teach_content"][$key][$sec_key] as $third_key => $third_val){
                        // button
                        echo'
                            <a href="'.$third_val.'" target="_blank">
                                <button class="btn btn-outline-primary btn-lg mt-3">                        
                        ';            
                        
                        echo $zh_tw_json["btns"][$third_key];
                       
                        echo'                    
                                </button>   
                            </a> 
                        ';
                    }
                }
            }   
            echo'
                </div>
            '; 
        }
    ?>
</div><!-- ./ Teach Pages-->
<!-- Research Pages -->
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json["implement_pg"]["research"];?>
    </h3>
</div>
<div class="row h3-title-container m-5 justify-content-between mt-3">
    <!-- Research Table -->
    <div class="table-scrollable mt-1 p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <?php
                        //column name 
                        foreach($zh_tw_json['implement_pg']['research_tb']['cols'] as $key => $val){
                            echo '<th scope="col" class="text-primary fw-bold h6">'.$val.'</th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($zh_tw_json['implement_pg']['research_tb']['row_title']) > 0){
                        // number of row
                        $num = count($zh_tw_json['implement_pg']['research_tb']['row_title']);
                        for($i = 0; $i < $num; $i++){
                            echo'
                                <tr>
                                    <th scope="row" class="book-table-header">
                                        '.$zh_tw_json['implement_pg']['research_tb']['row_title'][$i].'
                                    </th>
                                    <td>'.$zh_tw_json['implement_pg']['research_tb']['row_type'][$i].'</td>
                                    <td>'.$zh_tw_json['implement_pg']['research_tb']['row_date'][$i].'</td>                                   
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div><!-- ./ Research Table -->
</div><!-- ./ Research Pages-->
<!-- Practice Pages -->
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json["implement_pg"]["practice"];?>
    </h3>
</div>
<div class="row h3-title-container m-5 justify-content-between mt-3">
    <!-- Practice Table -->
    <div class="table-scrollable mt-1 p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <?php
                        //column name 
                        foreach($zh_tw_json['implement_pg']['practice_tb']['cols'] as $key => $val){
                            echo '<th scope="col" class="text-primary fw-bold h6">'.$val.'</th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($zh_tw_json['implement_pg']['practice_tb']['row_name']) > 0){
                        // number of row
                        $num = count($zh_tw_json['implement_pg']['practice_tb']['row_name']);
                        for($i = 0; $i < $num; $i++){
                            echo'
                                <tr>
                                    <th scope="row" class="book-table-header">
                                        '.$zh_tw_json['implement_pg']['practice_tb']['row_name'][$i].'
                                    </th>
                                    <td>'.$zh_tw_json['implement_pg']['practice_tb']['row_period'][$i].'</td>
                                    <td>'.$zh_tw_json['implement_pg']['practice_tb']['row_host'][$i].'</td>                                   
                                    <td>'.$zh_tw_json['implement_pg']['practice_tb']['row_depart'][$i].'</td>                                   
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div><!-- ./ Practice Table -->
</div><!-- ./ Practice Pages-->

