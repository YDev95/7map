<?php

include  "../bootstrap/init.php";

if(!isAjaxRequest()){

    die('Invalid Request!');


}


if(insertLocation($_POST)){

    echo 'لوکیشن با موفقتیت ثبت شد و منتظر تایید مدیرمیباشد';
}else{

    echo 'ثبت موقعیت با خطلا مواجه شده است';
}