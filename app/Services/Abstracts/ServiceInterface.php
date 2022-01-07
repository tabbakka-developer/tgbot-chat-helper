<?php

use Psr\Http\Message\ResponseInterface;

interface ServiceInterface
{
    public function sendGetRequest(string $key, string $method, array $options): ResponseInterface;

    public function sendPostRequest(string $key, string $method, array $options): ResponseInterface;
}