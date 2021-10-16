<li class="kt-menu__item {{ \App\Http\Helpers\Menu::routeStartsWith($activeRoute, 'kt-menu__item--open kt-menu__item--active') }}" aria-haspopup="true">
    <a href="{{ route($route) }}" class="kt-menu__link ">
        <i class="kt-menu__link-icon flaticon2-architecture-and-city"></i>
        <span class="kt-menu__link-text">{{ $text }}</span>
    </a>
</li>
