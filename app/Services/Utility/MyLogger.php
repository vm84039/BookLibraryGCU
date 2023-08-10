<?php

namespace App\Services\Utility;

use Monolog\Handler\LogglyHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MyLogger {
    public function logglyWithData($message, $data): void
    {
        $logger = new Logger('CST323Milestone');
        $logger->pushHandler(new StreamHandler('php://stdout'));
        $logger->pushHandler(new LogglyHandler('[0c708a17-921a-40d1-9d52-4b32f68f2a88]/tag/heroku --app polar-plateau-40494]', Logger::DEBUG));
        $logger->info($message, $data);
    }
    public function loggly($message): void
    {
        $logger = new Logger('CST323Milestone');
        $logger->pushHandler(new StreamHandler('php://stdout'));
        $logger->pushHandler(new LogglyHandler('[0c708a17-921a-40d1-9d52-4b32f68f2a88]/tag/heroku --app polar-plateau-40494]', Logger::DEBUG));
        $logger->info($message);
    }
}
