<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 30/07/15
 * Time: 00:57
 */

namespace GeProj\OAuth;

use Auth;

class Verifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}