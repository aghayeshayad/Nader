<?php

namespace App\Contracts;

interface SmsServiceContracts
{
    /**
     * Send sms for this phone number with this message
     * 
     * @param String $phone
     * @param String $message
     */
    public static function send($phone, $message);
}
