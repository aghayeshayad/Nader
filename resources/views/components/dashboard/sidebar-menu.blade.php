<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            <x-sidebar-menu-item :route="'admin.settings.index'" :activeRoute="'admin.settings'" :text="'اطلاعات هدر و فوتر'" />
            <x-sidebar-menu-item :route="'admin.products.index'" :activeRoute="'admin.products'" :text="'محصولات'" />
            <x-sidebar-menu-item :route="'admin.categories.index'" :activeRoute="'admin.categories'" :text="'دسته بندی‌ها'" />
            <x-sidebar-menu-item :route="'admin.discounts.index'" :activeRoute="'admin.discounts'" :text="'تخفیف‌ها'" />
        </ul>
    </div>
</div>
