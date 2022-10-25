<?php 

namespace App\Config;

class Response {

    
    public static function status200($success, $res, $message="")
    {
        http_response_code(200);

        if($success){
            return array( 'success' => true, 'data' => $res, 'message' => $message );
        }else{
            return array( 'success' => false, 'error_code' => $res, 'message' => $message );
        }
        
    }

    public static function error($code, $error_code=null, $message=null)
    {
        http_response_code($code);
        return array( 'error_code' => $error_code, 'message' => $message );
    }

}