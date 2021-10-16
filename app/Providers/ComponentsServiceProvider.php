<?php

namespace App\Providers;

use App\View\Components\dashboard\breadcrumb\breadcrumb;
use App\View\Components\dashboard\datepicker;
use App\View\Components\dashboard\fileinput;
use App\View\Components\dashboard\sideBarMenu;
use App\View\Components\dashboard\sideBarMenuItem;
use App\View\Components\dashboard\input;
use App\View\Components\dashboard\select;
use App\View\Components\dashboard\submitButton;
use App\View\Components\dashboard\textarea;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('sidebar-menu', sideBarMenu::class);
        Blade::component('sidebar-menu-item', sideBarMenuItem::class);
        Blade::component('d-input', input::class);
        Blade::component('submit-button', submitButton::class);
        Blade::component('select', select::class);
        Blade::component('date-picker', datepicker::class);
        Blade::component('file-input', fileinput::class);
        Blade::component('text-area', textarea::class);
        Blade::component('breadcrumb', breadcrumb::class);
    }
}
