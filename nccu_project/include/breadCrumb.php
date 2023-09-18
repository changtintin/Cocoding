<!-- Breadcrumb -->
<div class="row p-4">
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
        <ol class="breadcrumb">            
            <?php
                if(!empty($_GET)){
                    echo '
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                    ';
                    foreach ($zh_tw_json["intro_sec_theme"] as $key => $val) {
                        if (isset($_GET[$key])) {
                            $secTheme = new SecTheme($zh_tw_json["intro_sec_theme"][$key]);
                            $secTheme->setThemeLink($key);
                            $secTheme->firtThemeName = &$intro;
                            echo $secTheme->getParentBreadcrumb();
                            echo $secTheme->breadcrumb->breadcrumbObj;
                        }
                    }
                }                
            ?>
        </ol>
    </nav>
</div>