<?php
include 'config.php';

function fetchNumbers(){

    $numbers = [
        '255652896911',
        '255652890523',
        '255653078398',
        '255653079605',
        '255653071245',
        '255653076882'
    ];

    return $numbers;
}

function fetchSMS($number){

    $sms = [
        '255652896911' => 'Your OTP code is 552201',
        '255652890523' => 'Verification code 490402',
        '255653078398' => 'Your code is 229144',
        '255653079605' => 'OTP 812441',
    ];

    return $sms[$number] ?? 'No SMS Yet';
}

function removeCountryCode($number, $remove = 0){

    if($remove == 2){
        return substr($number,2);
    }

    if($remove == 3){
        return substr($number,3);
    }

    return $number;
}
?>
