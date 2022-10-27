<?php

namespace App\Libraries;

require( "vendor/autoload.php" );

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenAuthFirebase {

    private $key= 'ejemplo-de-llave';

    public function generate($id, $email, $data="", $duracion=1){
        
        $time = time();
	
        $payload = [      
            'id' => $id,
            'email' => $email,
            'data' => $data,
            'aud' => @$_SERVER['HTTP_USER_AGENT'],
            'iat' => $time,
            'exp' => $time + (3600*$duracion)
        ];
        
        return JWT::encode( $payload, $this->key, 'HS256' );
    }

    function validate($token, $byname=true, $idus=""){
        if($byname){
            $token = isset(getallheaders()[$token]) ? getallheaders()[$token] : '';
        }
        return JWT::decode($token, new Key($this->key, 'HS256'));
    }


}
	
	