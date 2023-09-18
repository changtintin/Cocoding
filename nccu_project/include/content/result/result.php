<div class ="row h1-title-container m-1">
    <div class="col-lg-1 col-sm-4" id="h1-title-decor"></div>
    <h1 class="col-lg-11 col-sm-8">
        <?php            
            echo $zh_tw_json['navbar']['result'];        
        ?>
    </h1>
</div>
<!-- Book -->
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>            
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json['result']['book']; ?>
    </h3>    
</div>
<div class ="row content-container mx-3">
    <!-- Book Table -->
    <div class="table-scrollable mt-3 p-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <?php
                        //column name 
                        foreach($zh_tw_json['book_tb'] as $key => $val){
                            echo '<th scope="col">'.$val.'</th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(count($zh_tw_json['book_tb_title_content'])>0){
                        // number of row
                        $num = count($zh_tw_json['book_tb_title_content']);
                        for($i = 0; $i < $num; $i++){
                            echo'
                                <tr>
                                    <th scope="row" class="book-table-header">
                                        '.$zh_tw_json['book_tb_title_content'][$i].'
                                    </th>
                                    <td>'.$zh_tw_json['book_tb_author_content'][$i].'</td>
                                    <td>'.$zh_tw_json['book_tb_publish_content'][$i].'</td>
                                    <td> </td>
                                    <td>'.$zh_tw_json['book_tb_publish_yr_content'][$i].'</td>
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table><!-- ./ Book Table -->
    </div><!-- ./ Book Table -->
</div><!-- ./ Book -->
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>            
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json['result']['journal']; ?>
    </h3>    
</div>
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>            
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json['result']['report']; ?>
    </h3>    
</div>
<div class ="row h3-title-container m-5">
    <div class="col-lg-1 col-sm-4" id="h3-title-decor"></div>            
    <h3 class="col-lg-11 col-sm-8">
        <?php echo $zh_tw_json['result']['audio_video']; ?>
    </h3>    
</div>