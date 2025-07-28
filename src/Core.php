<?php

namespace Iotamine;

class Core
{
    private $client;

    public function __construct(IotamineClient $client)
    {
        $this->client = $client;
    }

    public function listOS()
    {
        return $this->client->request("GET", "/os/");
    }

    public function listPOP()
    {
        return $this->client->request("GET", "/pop/");
    }
}
