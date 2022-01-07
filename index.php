<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'app/Services/Abstracts/ServiceInterface.php';
require_once 'app/Services/Abstracts/BaseTelegramService.php';
require_once 'app/Services/TelegramService.php';

require_once 'routing/Router.php';

if (!Router::checkAccess()) {
    header("HTTP/1.1 403 Forbidden");
}

Router::navigate();