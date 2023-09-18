<div class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">

        <a class="navbar-brand fs-2 fw-lighter" style="font-family: 'cwTeXYen';" href="index.php">

            網頁全端學習筆記

        </a>

        <li class="nav-item ms-auto">

            <form class="d-flex ms-auto">

                <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">

                <button class="btn btn-sm btn-outline-secondary" type="submit">Search</button>

            </form>

        </li>

    </div>

</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id = "main_nav">

    <div class="container-fluid">

        <a class="navbar-brand">

            Tatiana's Note

        </a>        

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbar-collapse">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item active mx-3"> 

                    <a class="nav-link" href="https://www.notion.so/tingchang/CS-Notes-1daeb074bf8b49cfba5a0e39788d6adc?pvs=4">Notion</a> 
                    
                </li>

                <li class="nav-item active mx-3"> 

                    <a class="nav-link" href="https://github.com/changtintin">Github</a> 
                    
                </li>                                            
            
                <!-- Note Nav for normal device -->
                <li id = "JSNav" class="nav-item dropdown ">

                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> JS </a>

                    <ul class="dropdown-menu">

                        <li> 

                            <a class="dropdown-item" href="#"> <b>JS HTML DOM Event</b> </a>

                            <ul class="submenu dropdown-menu">

                                <!-- JS HTML DOM Event -->
                                <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSDOM.php" ?>
                        
                            </ul>

                        </li>

                        <li> 

                            <a class="dropdown-item" href="#"> <b>JS HTML DOM Event</b> </a>

                            <ul class="submenu dropdown-menu">

                                <!-- JS Browser BOM -->
                                <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSBOM.php" ?>

                            </ul>

                        </li>

                        <li> 

                            <a class="dropdown-item" href="#"> <b>JS HTML DOM Event</b> </a>

                            <ul class="submenu dropdown-menu">

                                <!-- JS Web APIs -->
                                <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSAPI.php" ?>

                            </ul>

                        </li>
                       
                    </ul>

                </li>
                <!-- ./  Note Nav for normal device -->


                <!-- Nav for small device -->
                <div id = "subJSNav" >

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> JS DOM </a>

                        <ul class="dropdown-menu">

                            <!-- JS HTML DOM Event -->
                            <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSDOM.php" ?>                           
                           
                        </ul>

                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> JS BOM </a>

                        <ul class="dropdown-menu">

                            <!-- JS Browser BOM -->
                            <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSBOM.php" ?>

                        </ul>

                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> JS API </a>

                        <ul class="dropdown-menu">

                            <!-- JS Web APIs -->
                            <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navJSAPI.php" ?>

                        </ul>

                    </li>

                </div>
                <!-- ./  Nav for small device -->


                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Design Pattern </a>

                    <ul class="dropdown-menu">
                    
                        <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navDesginPattern.php" ?>

                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> 

                        Intersection Observer API                     

                    </a>

                    <ul class="dropdown-menu">
                    
                        <?php include "/Applications/MAMP/htdocs/Learn/include/nav/navIntersectionObserver.php" ?>

                    </ul>

                </li>

            </ul>            

        </div> 
        <!-- ./ navbar-collapse -->

    </div> 
    <!-- ./ container-fluid -->

</nav>