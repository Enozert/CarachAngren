<?php
$link = $host."/wordpress/wp-json/wp/v2/live";
$dataPrep = file_get_contents($link);
$data = json_decode($dataPrep, true);

for($i = 0; $i < count($data); $i++){
    switch ($data[$i]['slug']){
        case 'page-tile':
            $PageTitle = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'page-description':
            $pageDescription = strip_tags($data[$i]['content']['rendered']);
            break;
        case 'live':
            $txt1 = $data[$i]['title']['rendered'];
            break;
        case 'no-shows':
            $txtNoShow = $data[$i]['content']['rendered'];
            break;
        default:
            break;
    }
}

$link = $host."/wordpress/wp-json/wp/v2/categories";
$dataPrep = file_get_contents($link);
$categories = json_decode($dataPrep, true);

//Dev
include($root."/src/php/api/getShows.api.php");
GetShows($host);
 
$Shows = $_SESSION['Shows'];   
$categorys = $_SESSION['Categorys'];

//Live
// if(!empty($_SESSION['Shows'])){
//     $Shows = $_SESSION['Shows'];
//     $categorys = $_SESSION['Categorys'];
// }
// else{
//     include($_SERVER['DOCUMENT_ROOT']."/Recources/PHP/Api/getShows.api.php");
//     GetShows($host);
//     $Shows = $_SESSION['Shows'];   
//     $categorys = $_SESSION['Categorys'];    
// }