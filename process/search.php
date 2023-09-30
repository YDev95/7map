<?php


include  "../bootstrap/init.php";

if(!isAjaxRequest()){

    die('Invalid Request!');

}

if(!isset($_POST['keyword']) and strlen($_POST['keyword']) < 1){
    die('نتیجه ای یافت نشد');
}


$keyword = $_POST['keyword'];
$locations = getLocations(['keyword' => $keyword]);

if(sizeof($locations) == 0){
    die('نتیجه ای یافت نشد');

}
$locJSON = json_encode($locations);

echo $locJSON;