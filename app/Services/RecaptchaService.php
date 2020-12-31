<?php


namespace App\Services;


class RecaptchaService{

    public function isRecaptchaVisibleVerified(string $token) : bool{
        $json = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.config('services.recaptcha_visible')['secret_key'].'&response='.$token);
        $array = json_decode($json);
        return $array->success === true;
    }
    public function isRecaptchaInvisibleVerified(string $token) : bool{
        $json = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.config('services.recaptcha_invisible')['secret_key'].'&response='.$token);
        $array = json_decode($json);
        return $array->success === true;
    }
}
