<?php

namespace App\Libraries;

class EncUrl
{
    public static function encURl($id)
    {
        $enc = \Config\Services::encrypter();
        return base64_encode($enc->encrypt($id));
    }

    public static function decUrl($encryptedId)
    {
        $enc = \Config\Services::encrypter();
        return $enc->decrypt(base64_decode($encryptedId));
    }
}