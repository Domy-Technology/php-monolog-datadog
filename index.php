<?php

require __DIR__ . "/vendor/autoload.php";

use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

$logger = new Logger("global_logger");

$logger->pushProcessor(new \Monolog\Processor\ProcessIdProcessor());
$logger->pushProcessor(new \Monolog\Processor\GitProcessor());
$logger->pushProcessor(new \Monolog\Processor\MemoryUsageProcessor());

$stream_handler = new StreamHandler("php://stdout", Level::Info);
$formatter = new JsonFormatter();
$stream_handler->setFormatter($formatter);
$logger->pushHandler($stream_handler);

set_exception_handler(function ($e) {
    $uncaught_log = new Logger('uncaught');
    $uncaught_logstream = new StreamHandler('php://stdout', Logger::ERROR);
    $uncaught_logstream->setFormatter(new JsonFormatter());
    $uncaught_log->pushHandler($uncaught_logstream);
    $uncaught_log->error("Exceções não tratadas", ['exception' => $e]);
});

$logger->info("Inicializando Aplicação");

?>