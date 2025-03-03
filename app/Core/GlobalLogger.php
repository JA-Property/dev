<?php
namespace App\Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class GlobalLogger
{
    private static $logger;

    /**
     * Get the global logger instance.
     *
     * @return Logger
     */
    public static function getLogger()
    {
        if (!self::$logger) {
            // Create a new logger instance
            self::$logger = new Logger('app');

            // Define the log file path.
            // Adjust the path if needed. This path points to your project root /logs directory.
            $logFile = __DIR__ . '/../../logs/app.log';

            // Create a StreamHandler to write logs to the file with a DEBUG level.
            self::$logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));
        }

        return self::$logger;
    }
}
