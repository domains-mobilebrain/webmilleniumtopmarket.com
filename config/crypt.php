<?php


function generateToken($name , $token , $ip ) {
		$key = hash( 'sha256', TOKEN_KEY );
		$iv = substr( hash( 'sha256', TOKEN_IV ), 0, 16 );
		return base64_encode(openssl_encrypt($name.'||'.$token.'||'.$ip, "AES-256-CBC", $key, 0, $iv) );
	}



 ?>
