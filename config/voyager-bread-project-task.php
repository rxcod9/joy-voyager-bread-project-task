<?php

return [

    /*
     * If enabled for voyager-bread-project-task package.
     */
    'enabled' => env('VOYAGER_BREAD_PROJECT_TASK_ENABLED', true),

    /*
     * The config_key for voyager-bread-project-task package.
     */
    'config_key' => env('VOYAGER_BREAD_PROJECT_TASK_CONFIG_KEY', 'joy-voyager-bread-project-task'),

    /*
     * The route_prefix for voyager-bread-project-task package.
     */
    'route_prefix' => env('VOYAGER_BREAD_PROJECT_TASK_ROUTE_PREFIX', 'joy-voyager-bread-project-task'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadProjectTask\\Http\\Controllers',
    ],
];
