<?php

/**
 * Reform phone numbers.
 *
 * @todo accept other countries phone numbers.
 *
 * @param  string $phoneNumber
 * @return int
 */
function reformPhoneNumber($phoneNumber)
{
    if (preg_match('/^(\+989|00989|0989|989|09|9)(\d{9})$/', $phoneNumber, $matches)) {
        $phoneNumber = '9' . $matches[2];
    }

    return $phoneNumber;
}

/**
 * The expiration time for the cached data.
 * 
 * @return int
 */
function expirationTime($time)
{
    return Carbon\Carbon::parse($time, 'Asia/Tehran')->diffInSeconds();
}

/**
 * Convert persian numbers to English
 * 
 * @return string
 */
function convertNumbers($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($persian, $num, $string);
    $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

    return $englishNumbersOnly;
}

