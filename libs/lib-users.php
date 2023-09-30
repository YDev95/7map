<?php


function login($username,$password){

    global $admins;

    if(!(array_key_exists($username,$admins) && 
        $admins[$username] == $password)){

            return false;
        }

        $_SESSION['login'] = 1;
    return true;
}


function isLoggedIn(){

    if (isset($_SESSION['login'])){
    return true;
    }
    return false;

}


function logout(){

    unset($_SESSION['login']);
    
}