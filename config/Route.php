<?php 

namespace App\Config;

require './middleware/token.php';
use App\middleware\Token;

class Route {

    public static function check($route, $method, $middlewares, $type){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == $type){
            
            if(count($middlewares)>0){
                foreach ($middlewares as $middleware) {
                    self::middleware($middleware);
                }
            }

            echo $method;
            exit;

        }
    }

    public static function get($route, $method, $middleware = []){
        self::check($route, $method, $middleware, "get");
    }

    public static function post($route, $method, $middleware = []){
        self::check($route, $method, $middleware, "post");
    }

    public static function put($route, $method, $middleware = []){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "put"){
            echo $method;
            exit;
        }
    }

    public static function delete($route, $method, $middleware = []){
        if($route == $_GET['route'] && strtolower($_SERVER['REQUEST_METHOD']) == "delete"){
            echo $method;
            exit;
        }
    }

    public static function middleware($name) {
        
        if($name=="token"){
            Token::handle();
        }else{
            exit;
        }

        return true;

    }

    
}