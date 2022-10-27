<?php

namespace App\Libraries;

require( "vendor/autoload.php" );

use Firebase\JWT\JWT;

class TokenAuthFirebase {

    public function validate(){
        $key = 'ECC4E54DBA738857B84A7EBC6B5DC7187B8DA68750E88AB53AAA41F548D6F2SYSW3B';
	
        $payload = [      
            "Referencia" => "411010A120102X269536545236",
            "IdReferencia" => 2542695,
            "Total" => 115,
            "Cliente" => "oDIANA BERENICE VAZQUEZ MORALES",
        ];
        
        return JWT::encode( $payload, $key, 'HS256' );
    }


}
	
	