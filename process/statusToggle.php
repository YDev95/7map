<?php

include  "../bootstrap/init.php";

if(!isAjaxRequest()){

    die('Invalid Request!');

}


if(isset($_POST['locID']) && is_numeric($_POST['locID'])){

     echo toggleStatus($_POST['locID']);
}

