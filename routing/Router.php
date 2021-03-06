<?php

class Router
{
    public static function checkAccess(): bool
    {
        if (strpos($_SERVER['REQUEST_URI'], $_ENV['MY_KEY'])) {
            return true;
        }
        echo 'access denied';
        die(1);
        return false;
    }

    public static function navigate(): void
    {
        $found = false;
        foreach (self::routeList() as $route => $class) {
            if (!$found && strpos($_SERVER['REQUEST_URI'], $route)) {
                $found = true;
                call_user_func([
                    new $class,
                    $route
                ], []);
            }
        }

        if (!$found) {
            echo "route not found";
            die(1);
        }
    }

    private static function routeList(): array
    {
        return [
            'setwebhook' => TelegramService::class
        ];
    }
}