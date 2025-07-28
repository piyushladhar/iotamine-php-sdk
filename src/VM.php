<?php

namespace Iotamine;

class VM
{
    private $client;

    public function __construct(IotamineClient $client)
    {
        $this->client = $client;
    }

    public function list()
    {
        return $this->client->request("GET", "/vps/");
    }

    public function create(string $hostname, string $password, int $operatingSystem, int $pop, int $cores, int $ram, int $disk, int $traffic = 5)
    {
        return $this->client->request("POST", "/vps/", [
            'json' => [
                "hostname" => $hostname,
                "password" => $password,
                "operating_system" => $operatingSystem,
                "pop" => $pop,
                "cores" => $cores,
                "ram" => $ram,
                "disk" => $disk,
                "traffic" => $traffic
            ]
        ]);
    }

    public function details($vpsId)
    {
        return $this->client->request("GET", "/vps/{$vpsId}/");
    }

    public function start($vpsId)
    {
        return $this->client->request("GET", "/vps/{$vpsId}/start/");
    }

    public function stop($vpsId)
    {
        return $this->client->request("GET", "/vps/{$vpsId}/stop/");
    }

    public function restart($vpsId)
    {
        return $this->client->request("GET", "/vps/{$vpsId}/restart/");
    }

    public function poweroff($vpsId)
    {
        return $this->client->request("GET", "/vps/{$vpsId}/poweroff/");
    }

    public function rebuild($vpsId, $operatingSystem, $password)
    {
        return $this->client->request("POST", "/vps/{$vpsId}/rebuild/", [
            'json' => [
                "osid" => $operatingSystem,
                "new_pass" => $password,
                "conf_pass" => $password
            ]
        ]);
    }

    public function destroy($vpsId)
    {
        return $this->client->request("DELETE", "/vps/{$vpsId}/");
    }
}
