<?php 

require './config/Response.php';

use App\Config\Response;

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, PATCH, DELETE');
header("Allow: GET, POST, OPTIONS, PUT, PATCH , DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Authorization"); 
header('Content-Type: application/json'); 

if($_GET['route']=="index.php"){
    echo json_encode(Response::error(400, null, "Invalid path"));
    exit;
}

$route = explode('/', $_GET['route']);

echo json_encode(Response::error(400, null, "Invalid path"));
exit;