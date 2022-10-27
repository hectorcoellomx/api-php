<?php

namespace App\Libraries;

/**
 * TokenAuth 
 * 
 * @author          Hector Coello
 * @license         MIT
 * @version         2.0.0
 */


class TokenAuth {

    private $key= 'ejemplo-de-llave';
    private $setValid = false;
    private $token = "";

    public function __construct($newKey="") {
		if($newKey!=""){
			$this->key = $newKey;
		}
	}

	function setKey($key) {
		$this->key = $key;
	}

    function generate($id, $email, $data="", $duracion=1){
        $header = json_encode(array('alg' => "HS256", 'typ' => "JWT"));
        $time = time();
        $aud = @$_SERVER['HTTP_USER_AGENT'];
        $payload = json_encode(array('id' => $id, 'email' => $email, 'data' => $data, 'aud' => $aud, 'iat' => $time, 'exp' => $time + (3600*$duracion)));
        $encodedHeader= base64_encode($header);
        $encodedPayload= base64_encode($payload);
        $signature = hash_hmac("sha256", $encodedHeader . "." . $encodedPayload, $this->key, false);
        return $encodedHeader . "." . $encodedPayload . "." . $signature;
    }

	function validate($token, $byname=true, $idus=""){

        if($this->setValid){
			return array('val' => 1, 'det' => '1111');
		}

        if($byname){
            $token = isset(getallheaders()[$token]) ? getallheaders()[$token] : '';
            $this->token = $token;
        }else{
            $this->token = $token;
        }
		
		if($token==""){
			return array('val' => 0, 'det' => '0000');
		}

		$tk_array = explode(".", $token);

		$tk_array[0]= (isset($tk_array[0]))? $tk_array[0] : "";
		$tk_array[1]= (isset($tk_array[1]))? $tk_array[1] : "";
		$tk_array[2]= (isset($tk_array[2]))? $tk_array[2] : "";

		$text = $tk_array[0] . "." . $tk_array[1];
		$dato = json_decode(base64_decode($tk_array[1]),true);

		$usuario_valido= ($dato['id']==$idus || $idus==""); 
		$navegador = (@$_SERVER['HTTP_USER_AGENT']==$dato['aud']); 
		$activo =(($dato['exp'] - time())>0);
		$hash_valido = ($tk_array[2] == hash_hmac("sha256", $text, $this->key, false));
		
		$valido = ($hash_valido && $usuario_valido && $activo && $navegador)? 1:0;

		$detalle = ($hash_valido)? 1:0; //integridad
		$detalle .= ($usuario_valido)? 1:0; //usuario valido
		$detalle .= ($activo)? 1:0; // activo
		$detalle .= ($navegador)? 1:0; // navegador
		
		$resultado = array(
			'val' => $valido,
			'det' => $detalle
		);

		return $resultado;

    }
    
    function data($tk=""){
		if($tk==""){
			$tk = $this->token;
		}
		$tk_array = explode(".", $tk);
		$tk_array[1]= (isset($tk_array[1]))? $tk_array[1] : "";
		return json_decode(base64_decode($tk_array[1]),true);
	}

  

}
	
	