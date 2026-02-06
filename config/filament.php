<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    */

    'branding' => [
        'name' => 'BRIGHT MAX TRADING',
        'logo' => asset('images/logo.jpg'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Appearance
    |--------------------------------------------------------------------------
    */

    'appearance' => [
        'theme' => 'light',
        'colors' => [
            'danger' => '#ef4444',
            'gray' => '#6b7280',
            'info' => '#0ea5e9',
            'primary' => '#004B3B',
            'success' => '#50C878',
            'warning' => '#f59e0b',
        ],
        'font' => 'inter',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel
    |--------------------------------------------------------------------------
    */

    'pages' => [
        'dashboard' => \Filament\Pages\Dashboard::class,
    ],

    'resources' => [
        'should_register_default_resources' => false,
    ],

    'widgets' => [
        'should_register_default_widgets' => true,
    ],

    'middleware' => [
        'auth' => [
            \Illuminate\Auth\Middleware\Authenticate::class,
        ],
        'base' => [
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
            \Illuminate\Foundation\Http\Middleware\TrimStrings::class,
        ],
    ],

    'auth' => [
        'guard' => 'web',
    ],

    'layout' => [
        'actions' => [
            'modal' => [
                'actions' => [
                    'alignment' => 'left',
                ],
            ],
        ],
    ],

    'sidebar' => [
        'is-collapsible-on-desktop' => false,
        'width' => '20rem',
    ],

    'favicon' => null,

];
