<?php

class Router
{
    public static function checkAccess(): bool
    {
        if (strpos($_SERVER['REQUEST_URI'], $_ENV['MY_KEY'])) {
            return true;
        }
        return false;
    }

    public static function navigate(): void
    {
        foreach (self::routeList() as $route => $class) {
            if (strpos($route, $_SERVER['REQUEST_URI'])) {
                call_user_func([
                    $class,
                    $route
                ], []);
            }
        }
    }

    private static function routeList(): array
    {
        return [
            'setWebhook' => TelegramService::class
        ];
    }
}