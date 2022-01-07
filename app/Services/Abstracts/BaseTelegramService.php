<?php

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class BaseTelegramService implements ServiceInterface
{
    protected Client $client;

    private string $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->client = new Client();
        $this->baseUrl = $baseUrl;
    }

    public function sendGetRequest(string $key, string $method, array $options = []): ResponseInterface
    {
        return $this->client->get(
            $this->generateApiString($key, $method)
        );
    }

    public function sendPostRequest(string $key, string $method, array $options = []): ResponseInterface
    {
        return $this->client->post(
            $this->generateApiString($key, $method),
            $options
        );
    }

    private function generateApiString(string $key, string $method): string
    {
        return $this->baseUrl . '/bot' . $key . '/' . $method;
    }
}