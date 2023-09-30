<?php 
session_start();

include             "constants.php";
include             BASE_PATH . "/bootstrap/config.php";
include             BASE_PATH . "/libs/helper.php";
include             BASE_PATH . "/libs/lib-users.php";
include             BASE_PATH . "/vendor/autoload.php";



/* Connect to a MySQL database using driver invocation */
$dsn = "mysql:dbname=$dbConfig->db;host={$dbConfig->host}";

try {
    $pdo = new PDO($dsn, $dbConfig->user, $dbConfig->pass);
}
catch(PDOException $e){
    diePage($e);
    
}

include             BASE_PATH . "/libs/lib-locations.php";