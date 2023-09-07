<?php

namespace App\Library;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class ValueFirstLibrary
{
    protected string $token = '';

    public function __construct() {
        // $token = null;
    }

    public function getToken(): string {
        return $this->token . 'kkk';
    }

    public function setToken(array $jsonResponse) {
        $expiryDate = Carbon::parse($jsonResponse['expiryDate']);
        $now = Carbon::now();

        $ttlDiff = $expiryDate->diffInMinutes($now);

        $token = $jsonResponse['token'];
        $this->token = $token;

        return $ttlDiff;
    }

    public function fakeJson() : string
    {
        $fake = '{"token":"eyJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2FwaS5teXZhbHVlZmlyc3QuY29tL3BzbXMiLCJzdWIiOiJncmVlbmZpZWxkd2EiLCJleHAiOjE2OTQ4ODQyMDd9.JWrk_d2Qd655fZmnLe6XHdRJV2FhNEYgXEfOjS2kzBg","expiryDate":"2023-09-14 22:40:07"}';
        return $fake;
    }
}

// $testClass = new ValueFirstLibrary();

// $json = $testClass->fakeJson();

// echo $testClass->setToken(json_decode($json, true));

// echo "\n======\n\n======\n";

// echo $testClass->getToken();
