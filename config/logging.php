<?php

declare(strict_types=1);

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Laravel
    | utilizes the Monolog PHP logging library, which includes a variety
    | of powerful log handlers and formatters that you're free to use.
    |
    | Available drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog", "custom", "stack"
    |
    */

    'channels'     => [

        'daily'      => [
            'days'                 => env('LOG_DAILY_DAYS', 14),
            'driver'               => 'daily',
            'level'                => env('LOG_LEVEL', 'debug'),
            'path'                 => storage_path('logs/laravel.log'),
            'replace_placeholders' => true,
        ],

        'emergency'  => [
            'path' => storage_path('logs/laravel.log'),
        ],

        'errorlog'   => [
            'driver'               => 'errorlog',
            'level'                => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'null'       => [
            'driver'  => 'monolog',
            'handler' => NullHandler::class,
        ],

        'papertrail' => [
            'driver'       => 'monolog',
            'handler'      => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
                'host'             => env('PAPERTRAIL_URL'),
                'port'             => env('PAPERTRAIL_PORT'),
            ],
            'level'        => env('LOG_LEVEL', 'debug'),
            'processors'   => [PsrLogMessageProcessor::class],
        ],

        'single'     => [
            'driver'               => 'single',
            'level'                => env('LOG_LEVEL', 'debug'),
            'path'                 => storage_path('logs/laravel.log'),
            'replace_placeholders' => true,
        ],

        'slack'      => [
            'driver'               => 'slack',
            'emoji'                => env('LOG_SLACK_EMOJI', ':boom:'),
            'level'                => env('LOG_LEVEL', 'critical'),
            'replace_placeholders' => true,
            'url'                  => env('LOG_SLACK_WEBHOOK_URL'),
            'username'             => env('LOG_SLACK_USERNAME', 'Laravel Log'),
        ],

        'stack'      => [
            'channels'          => explode(',', env('LOG_STACK', 'single')),
            'driver'            => 'stack',
            'ignore_exceptions' => false,
        ],

        'stderr'     => [
            'driver'     => 'monolog',
            'formatter'  => env('LOG_STDERR_FORMATTER'),
            'handler'    => StreamHandler::class,
            'level'      => env('LOG_LEVEL', 'debug'),
            'processors' => [PsrLogMessageProcessor::class],
            'with'       => ['stream' => 'php://stderr'],
        ],

        'syslog'     => [
            'driver'               => 'syslog',
            'facility'             => env('LOG_SYSLOG_FACILITY', LOG_USER),
            'level'                => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "channels" configured below.
    |
    */

    'default'      => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace'   => env('LOG_DEPRECATIONS_TRACE', false),
    ],

];
