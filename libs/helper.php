<?php defined('BASE_PATH') or die("Access Denied!");

# made for more likely to use fundtions


function diePage(string $msg)
{

    echo " <div style= ' padding: 33px; margin: 20px; width: 80%; background: powderblue; border-radius: 5px; color: darkred; font-family: sans-serif; border: black solid;'> The error was: $msg</div>";
    die();
}

/** AJAX request checker */

function isAjaxRequest()
{

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        return true;
    }
    return false;
}

/** User Functions */


/** debug and dump function */

function dd($var)
{
    echo "<pre style ='background: aliceblue; color: #bb0707; border-radius: 10px; padding: 10px; border-left: red solid; margin: 10px;';>";
    var_dump($var);
    echo '</pre>';
}



// make url
function site_url($uri)
{

    return BASE_URL . $uri;
}

// message

function message($msg,$url,$class){

    if($class == 'fail'){
        $linkText = 'try Again';

    }
    else{
        $linkText = 'Back to homepage.';
    }
        echo " <div class ='$class'> <span>$msg</span><br><a href='$url'>$linkText</a></div>";
}

// Redirect

function redirect($url){

    header("Location: {$url}");
}