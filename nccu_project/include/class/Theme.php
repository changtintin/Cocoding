<?php
class FirstTheme {
    public $title;
    public Breadcrumb $breadcrumb;
    public $sec_themes;
    public $url;
    public function getCurrUrl() {
        // Program to display URL of current page.
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $link = "https";
        } else {
            $link = "http";
        }
        // Here append the common URL characters.
        $link.= "://";
        // Append the host(domain name, ip) to the URL.
        $link.= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL
        $link.= $_SERVER['REQUEST_URI'];
        // Get the link
        return $link;
    }
    public function setThemeLink($key) {
        // Program to display URL of current page.
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $link = "https";
        } else {
            $link = "http";
        }
        // Here append the common URL characters.
        $link.= "://";
        // Append the host(domain name, ip) to the URL.
        $link.= $_SERVER['HTTP_HOST'];
        $link.= "/nccu_project/index.php?";
        $link.= $key . "=1";
        $this -> url = $link;
    }
    public function __construct($name) {
        $this -> sec_themes = array();
        $this -> title = $name;
        $this -> breadcrumb = new Breadcrumb();
        $this -> breadcrumb -> generateCurrCrumb($this -> title);
    }
    public function addSecTheme($secTheme) {
        $this -> sec_themes[] = $secTheme;
    }
}
class SecTheme extends FirstTheme {
    public $firtThemeName;
    public function getParentBreadcrumb() {
        return $this -> firtThemeName -> breadcrumb -> generateParentCrumb($this -> firtThemeName -> title, $this -> firtThemeName -> url);
    }
    public function addFirstTheme() {
    }
}
?>