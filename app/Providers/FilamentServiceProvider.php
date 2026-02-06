<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        FilamentColor::register([
            'danger' => Color::Rose::class,
            'gray' => Color::Gray::class,
            'info' => Color::Blue::class,
            'primary' => Color::rgb('rgb(0, 75, 59)'),
            'success' => Color::Green::class,
            'warning' => Color::Amber::class,
        ]);
    }
}
