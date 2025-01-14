<?php

declare(strict_types=1);

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'mariadb' => [
            'charset'        => env('DB_CHARSET', 'utf8mb4'),
            'collation'      => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'database'       => env('DB_DATABASE', 'laravel'),
            'driver'         => 'mariadb',
            'engine'         => null,
            'host'           => env('DB_HOST', '127.0.0.1'),
            'options'        => extension_loaded('pdo_mysql') ? array_filter(
                [
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]
            ) : [],
            'password'       => env('DB_PASSWORD', ''),
            'port'           => env('DB_PORT', '3306'),
            'prefix'         => '',
            'prefix_indexes' => true,
            'strict'         => true,
            'unix_socket'    => env('DB_SOCKET', ''),
            'url'            => env('DB_URL'),
            'username'       => env('DB_USERNAME', 'root'),
        ],

        'mysql'   => [
            'charset'        => env('DB_CHARSET', 'utf8mb4'),
            'collation'      => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'database'       => env('DB_DATABASE', 'laravel'),
            'driver'         => 'mysql',
            'engine'         => null,
            'host'           => env('DB_HOST', '127.0.0.1'),
            'options'        => extension_loaded('pdo_mysql') ? array_filter(
                [
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ]
            ) : [],
            'password'       => env('DB_PASSWORD', ''),
            'port'           => env('DB_PORT', '3306'),
            'prefix'         => '',
            'prefix_indexes' => true,
            'strict'         => true,
            'unix_socket'    => env('DB_SOCKET', ''),
            'url'            => env('DB_URL'),
            'username'       => env('DB_USERNAME', 'root'),
        ],

        'pgsql'   => [
            'charset'        => env('DB_CHARSET', 'utf8'),
            'database'       => env('DB_DATABASE', 'laravel'),
            'driver'         => 'pgsql',
            'host'           => env('DB_HOST', '127.0.0.1'),
            'password'       => env('DB_PASSWORD', ''),
            'port'           => env('DB_PORT', '5432'),
            'prefix'         => '',
            'prefix_indexes' => true,
            'search_path'    => 'public',
            'sslmode'        => 'prefer',
            'url'            => env('DB_URL'),
            'username'       => env('DB_USERNAME', 'root'),
        ],

        'sqlite'  => [
            'busy_timeout'            => null,
            'database'                => env('DB_DATABASE', database_path('database.sqlite')),
            'driver'                  => 'sqlite',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'journal_mode'            => null,
            'prefix'                  => '',
            'synchronous'             => null,
            'url'                     => env('DB_URL'),
        ],

        'sqlsrv'  => [
            'charset'        => env('DB_CHARSET', 'utf8'),
            'database'       => env('DB_DATABASE', 'laravel'),
            'driver'         => 'sqlsrv',
            'host'           => env('DB_HOST', 'localhost'),
            'password'       => env('DB_PASSWORD', ''),
            'port'           => env('DB_PORT', '1433'),
            'prefix'         => '',
            'prefix_indexes' => true,
            'url'            => env('DB_URL'),
            'username'       => env('DB_USERNAME', 'root'),
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default'     => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations'  => [
        'table'                  => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis'       => [

        'cache'   => [
            'database' => env('REDIS_CACHE_DB', '1'),
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD'),
            'port'     => env('REDIS_PORT', '6379'),
            'url'      => env('REDIS_URL'),
            'username' => env('REDIS_USERNAME'),
        ],

        'client'  => env('REDIS_CLIENT', 'phpredis'),

        'default' => [
            'database' => env('REDIS_DB', '0'),
            'host'     => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD'),
            'port'     => env('REDIS_PORT', '6379'),
            'url'      => env('REDIS_URL'),
            'username' => env('REDIS_USERNAME'),
        ],

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix'  => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

    ],

];
