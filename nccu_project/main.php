<?php
include "./include/class/BreadCrumb.php";
include "./include/class/Theme.php";
/*
        Decode Json to php 
*/
$handle = fopen("./lang/zh-tw/zh-tw.json", "r");
$zh_tw_json = "";
while (!feof($handle)) {
    $zh_tw_json.= fread($handle, 10000);
}
fclose($handle);
$zh_tw_json = json_decode($zh_tw_json, true);
/*
        Theme of navbar
*/
$intro = new FirstTheme($zh_tw_json["navbar"]["intro"]);
$campaign = new FirstTheme($zh_tw_json["navbar"]["campaign"]);
$lecture = new FirstTheme($zh_tw_json["navbar"]["lecture"]);
$implement = new FirstTheme($zh_tw_json["navbar"]["implement"]);
$result = new FirstTheme($zh_tw_json["navbar"]["result"]);
$donate = new FirstTheme($zh_tw_json["navbar"]["donate"]);
$links = new FirstTheme($zh_tw_json["navbar"]["links"]);
/*
        Set theme links
*/
$intro->setThemeLink("intro");
$campaign->setThemeLink("campaign");
$lecture->setThemeLink("lecture");
$implement->setThemeLink("implement");
$result->setThemeLink("result");
$donate->setThemeLink("donate");
$links->setThemeLink("links");
/*
        SecTheme of intro
*/
$origin = new SecTheme($zh_tw_json["intro_sec_theme"]["origin"]);
$develop = new SecTheme($zh_tw_json["intro_sec_theme"]["develop"]);
$structure = new SecTheme($zh_tw_json["intro_sec_theme"]["structure"]);
$member = new SecTheme($zh_tw_json["intro_sec_theme"]["member"]);
$location = new SecTheme($zh_tw_json["intro_sec_theme"]["location"]);
$law = new SecTheme($zh_tw_json["intro_sec_theme"]["law"]);
/*
        Set SecTheme of Intro links
*/
$origin->setThemeLink("origin");
$develop->setThemeLink("develop");
$structure->setThemeLink("structure");
$member->setThemeLink("member");
$location->setThemeLink("location");
$law->setThemeLink("law");
$intro->addSecTheme($origin);
$intro->addSecTheme($develop);
$intro->addSecTheme($structure);
$intro->addSecTheme($member);
$intro->addSecTheme($location);
$intro->addSecTheme($law);
$origin->firtThemeName = & $intro;
$develop->firtThemeName = & $intro;
$structure->firtThemeName = & $intro;
$member->firtThemeName = & $intro;
$location->firtThemeName = & $intro;
$law->firtThemeName = & $intro;
?>