<?php


namespace App\Http\Helpers;


use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Route;

class Menu
{
    /**
     * Return Dashboard menu items
     */
    public static function items()
    {
        foreach (Module::allEnabled() as $key => $value) {
            if (Module::has($key) && view()->exists(strtolower($key)."::layouts.menu")) {
                $menu[] = strtolower($key)."::layouts.menu";
            }
        }
        return $menu;
    }

    /**
     * Detect Active Route based on given route name
     *
     * @param $route string  route name for check if requested route name equals to current route name
     * @param string $output string The css class which prefer to return in case of active route equals to given route
     * @param string|mixed $not_active return value in case of route is not active
     * @return string default value is active
     */
    public static function routeIsActive($route, $output, $not_active = null)
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
        return $not_active;
    }

    /**
     * This Function will check if current route name starts with given value as $str
     *
     * @param string $str it accepts string or regex operation end of route which requested to check with end of
     * current route name
     * @param null $output string the css class in case of route match
     * @return null|string
     */
    public static function routeStartsWith($str, $output)
    {
        $re = "/^($str)/m";
        if (preg_match($re, Route::currentRouteName())) {
            return $output;
        }
    }
}
