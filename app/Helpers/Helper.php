<?php

namespace App\Helpers;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Helper {

	public static function randomNumber($number = 10)
	{
		$randomNumber = mt_rand(1, 9);

    	for ($i = 1; $i < $number; $i++) {
		    $randomNumber .= mt_rand(0, 9);
		}

		return $randomNumber;
    }

    public static function decrypt($id)
    {
    	try {
		    $decrypted = Crypt::decrypt($id);
		} catch (DecryptException $e) {
		    abort(404);
		}
		return $decrypted;
    }

    public static function encrypt($id)
    {
    	return Crypt::encrypt($id);
    }
}