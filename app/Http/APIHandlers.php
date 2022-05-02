<?php

namespace App\Http;
use Exception;

class APIHandlers
{
    public static function seedData_to_api($url,$postdata)
    {


        $curl = curl_init();
        $sendpostdata = json_encode($postdata);
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$sendpostdata,
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer b53006a45431bd94f7da4d8a30abbe355c7d266822a018b810f0e4de0880a4ad'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

}
