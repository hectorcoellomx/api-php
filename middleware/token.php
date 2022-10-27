<?php 

namespace App\Middleware;

use App\Config\Response;

class Token {

    public static function valid()
    {
        $valid = true;

        if(!$valid){
            echo json_encode(Response::error(400, null, "Invalid token"));
            exit;
        }

    }

}