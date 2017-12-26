<?php

namespace App;

use Auth;

class FirebaseClient
{
	public static $firebase;
	
	public static function firebase()
	{
		if(self::$firebase)
			return self::$firebase;

		self::$firebase = $firebase = (new \Firebase\Factory())
    			->withCredentials(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'maps-asset-38755060-firebase-adminsdk-dw8y2-978db5a084.json')
    			->withDatabaseUri('https://maps-asset-38755060.firebaseio.com')
    			->create();
    
		return self::$firebase;
	}
	
	public static function getReference($ref)
	{
		return self::firebase()->getDatabase()->getReference($ref);
	}
	
	public static function createToken($uid, $motorista = false)
	{
		$tokenHandler 	= self::firebase()->getTokenHandler();
		$claims 		= [];
		
		if($motorista)
			$claims['motorista'] = true;
		
		$customToken 	= $tokenHandler->createCustomToken($uid, $claims);
		
		return (string) $customToken;
	}


	public static function verifyToken($token)
	{
		return self::firebase()->getTokenHandler()->verifyIdToken($token);
	}
}

