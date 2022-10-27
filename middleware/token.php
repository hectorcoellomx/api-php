<?php 

namespace App\Middleware;

use App\Config\Response;
use App\Libraries\TokenAuth;

class Token {

    public static function handle()
    {
        $valid = true;

        $tokenAuth = new TokenAuth();
        $val = $tokenAuth->validate( isset($_GET['tk']) ? $_GET['tk'] : '' , false);
        $valid = ($val['val']==1);
        
        if(!$valid){
            $error_code = $val['det']=="0000" ? 1 : ( $val['det']=="1101" ? 4 : 2 );
            echo json_encode(Response::error(401, $error_code, $val['det']));
            exit;
        }

    }

}