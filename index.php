<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'app/Services/Abstracts/ServiceInterface.php';
require_once 'app/Services/Abstracts/BaseTelegramService.php';
require_once 'app/Services/TelegramService.php';

var_dump(123);


//$service = new TelegramService();
//
//var_dump($service->getMe());
//die(1);