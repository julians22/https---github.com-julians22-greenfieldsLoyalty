<?php

namespace App\Library;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class ValueFirstLibrary
{
    public function setToken(array $jsonResponse) : void {
        $expiryDate = Carbon::parse($jsonResponse['expiryDate']);
        $now = Carbon::now();
        $ttlDiff = $expiryDate->diffInMinutes($now);
        $token = $jsonResponse['token'];
        Cache::put('value_first_bearer', $token, $ttlDiff);
    }

    public function getToken() {
        $token = Cache::get('value_first_bearer', null);

        if ($token) {
            return $token;
        }
        return $this->reGenerateToken();
    }

    public function reGenerateToken() {
        $headers = [
            'Authorization' => config("valuefirst.basic")
        ];

        $url = config("valuefirst.base_url") . "/api/messages/token?action=generate";

        $response = Http::withHeaders($headers)
            ->post($url);

        $response->throw();

        $responseJson = $response->body();

        $json = json_decode($responseJson, true);

        $this->setToken($json);

        activity()
            ->causedBy(auth()->user())
            ->log('Success requesting token, with response '.$response->body());

        return $json['token'] ?? null;
    }

    public function sendOtp($phone, $otp) {

        $body = '{ "@VER": "1.2", "USER":{ "@CH_TYPE": "4", "@UNIXTIMESTAMP": ""}, "DLR":{ "@URL": ""}, "SMS": [ { "@UDH": "0", "@CODING": "1", "@TEMPLATEINFO": "1022522542~'.$otp.'", "@B_URLINFO": "'.$otp.'", "@PROPERTY": "0", "@MSGTYPE": "3", "@ID": "1", "ADDRESS": [ { "@FROM": "6285172100967", "@TO": "'.$phone.'", "@SEQ": "1", "@TAG": "TID 1022522542 Test"} ]} ]}';

        $url = config("valuefirst.base_url") . "/servlet/psms.JsonEservice";

        $response = Http::withToken($this->getToken())
            ->retry(2, 0, function ($exception) {
                if (! $exception instanceof RequestException || $exception->response->status() !== 401) {
                    $this->reGenerateToken();
                    return false;
                }

                activity()
                    ->causedBy(auth()->user())
                    ->log('Retry send otp, by regenerating token');

                return true;
            })
            ->withBody($body, 'application/json')
            ->post($url);

        activity()
            ->causedBy(auth()->user())
            ->log('Success requesting otp, with response '.$response->body());

        return [
            'response' => $response
        ];
    }
}
