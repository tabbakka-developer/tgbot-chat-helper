<?php

use Psr\Http\Message\ResponseInterface;

class TelegramService extends BaseTelegramService
{
    public function __construct()
    {
        $baseUrl = "https://api.telegram.org";
        parent::__construct($baseUrl);
    }

    public function getMe()
    {
        try {
            return $this->readResponse(
                $this->sendGetRequest($_ENV['TELGRAM_SECURE_KEY'], 'getMe')
            );
        } catch (\Exception $exception) {
            var_dump($exception);
            die(1);
        }
    }

    /**
     * @throws JsonException
     * @throws Exception
     */
    public function readResponse(ResponseInterface $response)
    {
        if (!in_array($response->getStatusCode(), [200, 201])) {
            throw new Exception("Wrong status code." . $response->getStatusCode());
        }

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    }

    public function setWebhook()
    {
        try {
            $data = $this->readResponse(
                $this->sendGetRequest($_ENV['TELGRAM_SECURE_KEY'], 'setWebhook', [
                    'url' => 'http://161.35.217.28/thisismytestbot',
                    'ip_address' => '161.35.217.28'
                ])
            );

            var_dump($data);
            die(1);
        } catch (\Exception $exception) {
            var_dump($exception);
            die(1);
        }
    }
}