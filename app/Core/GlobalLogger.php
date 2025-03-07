<?php
namespace App\Core;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\JsonFormatter;

class GlobalLogger
{
    private static $logger;

    /**
     * Get the global logger instance.
     *
     * @return Logger
     */
    public static function getLogger(): Logger
    {
        if (!isset(self::$logger)) {
            self::$logger = new Logger('app');

            // Log File Paths
            $logDir = __DIR__ . '/../../logs/';
            $textLogFile = $logDir . 'app.log';       // Human-readable logs
            $jsonLogFile = $logDir . 'app.json.log';  // JSON logs

            // Custom log format: [2025-03-07 12:34:56] [ERROR] [DatabaseModule] Database connection failed {"host":"localhost"}
            $textFormat = "[%datetime%] [%level_name%] [%extra.module%] %message% %context%\n";
            $textFormatter = new LineFormatter($textFormat, "Y-m-d H:i:s", true, true);

            // File Handler (Human-readable)
            $textHandler = new RotatingFileHandler($textLogFile, 7, Logger::DEBUG);
            $textHandler->setFormatter($textFormatter);

            // File Handler (JSON format)
            $jsonHandler = new RotatingFileHandler($jsonLogFile, 7, Logger::DEBUG);
            $jsonHandler->setFormatter(new JsonFormatter());

            // Browser Console Logging (for debugging)
            $browserHandler = new BrowserConsoleHandler(Logger::DEBUG);
            $browserHandler->setFormatter($textFormatter);

            // Push Handlers
            self::$logger->pushHandler($textHandler);  // Plain text logs
            self::$logger->pushHandler($jsonHandler);  // JSON logs
            self::$logger->pushHandler($browserHandler); // Browser console logs
        }

        return self::$logger;
    }

    /**
     * Standardized Logging Methods with Module Support
     */
    public static function debug(string $module, string $message, array $context = [])
    {
        self::getLogger()->debug($message, array_merge($context, ['module' => $module]));
    }

    public static function info(string $module, string $message, array $context = [])
    {
        self::getLogger()->info($message, array_merge($context, ['module' => $module]));
    }

    public static function notice(string $module, string $message, array $context = [])
    {
        self::getLogger()->notice($message, array_merge($context, ['module' => $module]));
    }

    public static function warning(string $module, string $message, array $context = [])
    {
        self::getLogger()->warning($message, array_merge($context, ['module' => $module]));
    }

    public static function error(string $module, string $message, array $context = [])
    {
        self::getLogger()->error($message, array_merge($context, ['module' => $module]));
    }

    public static function critical(string $module, string $message, array $context = [])
    {
        self::getLogger()->critical($message, array_merge($context, ['module' => $module]));
    }

    public static function alert(string $module, string $message, array $context = [])
    {
        self::getLogger()->alert($message, array_merge($context, ['module' => $module]));
    }

    public static function emergency(string $module, string $message, array $context = [])
    {
        self::getLogger()->emergency($message, array_merge($context, ['module' => $module]));
    }
}
