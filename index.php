<?php 

if($_GET['route']=="index.php"){
    echo "sin ruta";
    exit;
}

$route = explode('/', $_GET['route']);

print_r($route);