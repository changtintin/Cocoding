<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="main_nav" style="font-family: 'cwTeXYen'">
    <div class="container-fluid">       
        <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbar-collapse" data-bs-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <!-- navbar-nav ms-auto -->
            <ul class="navbar-nav ms-auto">
                <?php
                    /*
                        This should implemented by a NAV class or something
                    */
                    function genNav(FirstTheme &$nav){

                        if(!empty($nav -> sec_themes)){

                            echo'<li class="nav-item dropdown">';

                            echo '
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 

                                '.$nav -> title.'

                                </a>
                                
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            ';

                            for($i = 0; $i < count($nav -> sec_themes);$i++){
                                echo '
                                
                                    <li> 

                                        <a class="dropdown-item" href="'.$nav -> sec_themes[$i] -> url.'"> <b>'.$nav -> sec_themes[$i]->title.'</b> </a>
            
                                    </li>
                                ';
                            }

                            echo '
                                    </ul>
                                
                            ';

                            echo'</li>';
                        }
                        else{
                            echo '
                                
                                <li class="nav-item active mx-3"> 

                                    <a class="nav-link" href="'.$nav -> url.'">'

                                    .$nav -> title.

                                    '</a> 
                
                                </li>

                            ';
                        }
                    }
            
                    /*
                        NavBar
                    */
                    genNav($intro);

                    genNav($campaign);

                    genNav($lecture);

                    genNav($implement);

                    genNav($result);

                    genNav($donate);

                    genNav($links);
                ?>
                 
            </ul><!-- ./  navbar-nav ms-auto -->
        </div><!-- ./ navbar-collapse -->
    </div><!-- ./ container-fluid -->
</nav>