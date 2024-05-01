<?php

namespace App\Libraries;

class HashPass
{
    public static function pass_enc($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function pass_dec($password, $db_password)
    {
        if (password_verify($password, $db_password)) {
            return true;
        } else {
            return false;
        }
    }
}