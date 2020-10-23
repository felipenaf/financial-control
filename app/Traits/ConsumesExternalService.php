<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        try {
            $client = new Client([
                'base_uri' => $this->baseUri
            ]);

            if (isset($this->key)) {
                $headers['Authorization'] = $this->key;
            }

            $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);

            return [
                "code"      => $response->getStatusCode(),
                "data"      => \json_decode($response->getBody(), true),
                "status"    => true
            ];

        } catch (\Throwable $th) {
            return [
                "code"      => isset($th->getResponse()->getStatusCode) ? $th->getResponse()->getStatusCode() : 500,
                "error"     => explode("\n", $th->getMessage()),
                "status"    => false
            ];
        }
    }
}
