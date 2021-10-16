<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class sideBarMenuItem extends Component
{
    /**
     * Menu item route
     * 
     * @var string
     */
    public $route;

    /**
     * Menu item text
     * 
     * @var string
     */
    public $text;

    /**
     * Menu item active route
     * 
     * @var string
     */
    public $activeRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $activeRoute, $text)
    {
        $this->route = $route;
        $this->activeRoute = $activeRoute;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar-menu-item');
    }
}
