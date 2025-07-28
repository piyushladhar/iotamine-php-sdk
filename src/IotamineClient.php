<?php

namespace Iotamine;

use GuzzleHttp\Client;
use Exception;

class IotamineClient
{
    private $client;
    private $apiKey;

    public function __construct(string $apiKey, string $baseUrl = "https://iotamine.com/api/")
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'verify' => false,
            'headers' => [
                'Authorization' => "Api-Key {$this->apiKey}",
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ],
        ]);
    }

    public function request(string $method, string $endpoint, array $options = [])
    {
        try {
            $response = $this->client->request($method, ltrim($endpoint, '/'), $options);
            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            throw new Exception("Iotamine API Error: " . $e->getMessage());
        }
    }
}
