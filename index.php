<?php 

require './Helper/functions.php';
require './Config/Response.php';

use App\Config\Response;

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, PUT, POST, PATCH, DELETE');
header("Allow: GET, POST, OPTIONS, PUT, PATCH , DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Authorization"); 
header('Content-Type: application/json'); 

if($_GET['route']=="index.php"){
    
    // $res = $tokenAuth->generate(100, "hectorcoello@example.com");

    echo json_encode(Response::error(400, null, "Invalid path"));
    exit;
    
}

$route = explode('/', $_GET['route']);
$controllers = array('product');

if($route[0]=="api" && isset($route[1]) && in_array( $route[1], $controllers)){
    
    require './routes/' .$route[1]. '.php';

}else{
    echo json_encode(Response::error(400, null, "Invalid path"));
    exit;
}
