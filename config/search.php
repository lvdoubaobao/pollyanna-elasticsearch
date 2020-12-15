<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Connection Host
    |--------------------------------------------------------------------------
    |
    | Set up one or more host connections
    |
    */

    'hosts'=>[],

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Default Index
    |--------------------------------------------------------------------------
    |
    | The default search index
    |
    */

    'index' => '',

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Default Type
    |--------------------------------------------------------------------------
    |
    | The default search type
    |
    */

    'type' => 'basic',

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Connection Pool
    |--------------------------------------------------------------------------
    |
    | Choose the following
    |
    | Elasticsearch\ConnectionPool\StaticNoPingConnectionPool::class
    | Elasticsearch\ConnectionPool\SimpleConnectionPool::class
    | Elasticsearch\ConnectionPool\SniffingConnectionPool::class
    | Elasticsearch\ConnectionPool\StaticConnectionPool::class
    |
    */

    'connection_pool' => Elasticsearch\ConnectionPool\StaticNoPingConnectionPool::class,

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Connection Pool
    |--------------------------------------------------------------------------
    |
    | Setting the Connection Selector
    |
    | Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector::class
    | Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector::class
    | Elasticsearch\ConnectionPool\Selectors\RandomSelector::class
    |
    */

    'selector'=> Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector::class,

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch log path
    |--------------------------------------------------------------------------
    |
    | Set whether the log to open the record
    |
    */

    'open_log' => false,

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch log path
    |--------------------------------------------------------------------------
    |
    | Setting the Connection Selector
    |
    | Elasticsearch\ConnectionPool\Selectors\StickyRoundRobinSelector::class
    | Elasticsearch\ConnectionPool\Selectors\RoundRobinSelector::class
    | Elasticsearch\ConnectionPool\Selectors\RandomSelector::class
    |
    */

    'log_path' => storage_path('logs/elasticsearch.log'),

];