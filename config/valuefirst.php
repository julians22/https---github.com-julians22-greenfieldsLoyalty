<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Value First Auth header
    |--------------------------------------------------------------------------
    |
    | Every private request need an authorizzation, we will use a basic method
    | Authorization, Value First are providing the Basic Token, which is we
    | can use that on generation the Beare Token.
    |
    */
    "basic" => env("VALUE_FIRST_BASIC_AUTH", "Basic Z3JlZW5maWVsZHdhOnFAMERbWjlbWzFrSlN2"),

    /*
    |--------------------------------------------------------------------------
    | Value First Base URL API
    |--------------------------------------------------------------------------
    */
    "base_url" => env("VALUE_FIRST_BASE_URL", "https://api.myvfirst.com/psms")

];

