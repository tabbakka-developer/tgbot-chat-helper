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
            $data = $this->readResponse(
                $this->sendGetRequest($_ENV['TELGRAM_SECURE_KEY'], 'getMe')
            );

            return $data;
        } catch (\Exception $exception) {
            var_dump($exception);
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

    }
}