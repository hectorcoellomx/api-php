<?php 

namespace App\Config;

require './middleware/token.php';
use App\middleware\Token;

class Route {

    public static function get($route, $method){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "get"){
            echo $method;
            exit;
        }
    }

    public static function post($route, $method){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "post"){
            echo $method;
            exit;
        }
    }

    public static function put($route, $method){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "put"){
            echo $method;
            exit;
        }
    }

    public static function delete($route, $method){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "delete"){
            echo $method;
            exit;
        }
    }

    public static function middleware($name) {
        
        if($name=="token"){
            Token::valid();
        }else{
            exit;
        }

        return new self;
    }

    
}