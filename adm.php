<?php
include "bootstrap/init.php";


if(isset($_GET['logout']) ){

    logout();

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!(login($_POST['username'], password_verify($_POST['password'],$admins['admin'])))){

        echo 'نام کاربری یا رمز ورود اشتباه است';
    }
}




if(isLoggedIn()){

    $params = $_GET ?? [];
    $locations = getLocations($params);

    include "tpl/tpl-adm.php";
    
}
else{
    
    include "tpl/tpl-adm-auth.php";
   


}