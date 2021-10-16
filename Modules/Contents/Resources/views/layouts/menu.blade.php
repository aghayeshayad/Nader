<li class='kt-menu__item  kt-menu__item--submenu
{{ \App\Http\Helpers\Menu::routeStartsWith('admin.contents', 'kt-menu__item--open kt-menu__item--active') }}
{{ \App\Http\Helpers\Menu::routeStartsWith('admin.contents-category', 'kt-menu__item--open kt-menu__item--active') }}
{{ \App\Http\Helpers\Menu::routeStartsWith('admin.contents-tags', 'kt-menu__item--open kt-menu__item--active') }}
{{ \App\Http\Helpers\Menu::routeStartsWith('admin.contents-comment', 'kt-menu__item--open kt-menu__item--active') }}'
    aria-haspopup='true' data-ktmenu-submenu-toggle='hover'>
    <a href='javascript:;' class='kt-menu__link kt-menu__toggle'>
        <i class='kt-menu__link-icon flaticon2-file-1'></i>
        <span class='kt-menu__link-text'>ثبت محتوا</span>
        <i class='kt-menu__ver-arrow la la-angle-left'></i>
    </a>
    <div class='kt-menu__submenu'>
        <ul class='kt-menu__subnav'>
            <li class='kt-menu__item'>
                <a href='{{ route('admin.contents.index', ['category_id' => 0]) }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.contents.index', 'text-danger') }}'>
                        لیست مقالات
                    </span>
                </a>
            </li>
            <li class='kt-menu__item'>
                <a href='{{ route('admin.contents-category.index', ['parent_id' => 0]) }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.contents-category.index', 'text-danger') }}'>
                        دسته بندی و مقالات
                    </span>
                </a>
            </li>
            <li class='kt-menu__item'>
                <a href='{{ route('admin.contents-tags.index') }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.contents-tags.index', 'text-danger') }}'>
                        تگ ها
                    </span>
                </a>
            </li>
            <li class='kt-menu__item'>
                <a href='{{ route('admin.contents-comment.index') }}' class='kt-menu__link'>
                    <i class='kt-menu__link-bullet kt-menu__link-bullet--dot'>
                        <span></span>
                    </i>
                    <span
                        class='kt-menu__link-text {{ \App\Http\Helpers\Menu::routeIsActive('admin.contents-comment.index', 'text-danger') }}'>
                        نظرات
                    </span>
                </a>
            </li>
        </ul>
    </div>
</li>

