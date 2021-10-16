<?php

use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function($trail) {});

Breadcrumbs::for('categories-list', function($trail) {
    $trail->push('لیست دسته بندی‌ها', route('admin.categories.index'));
});

Breadcrumbs::for('categories-create', function($trail) {
    $trail->parent('categories-list');
    $trail->push('افزودن دسته بندی‌');
});

Breadcrumbs::for('categories-edit', function($trail) {
    $trail->parent('categories-list');
    $trail->push('ویرایش دسته بندی‌');
});

Breadcrumbs::for('subcategories-list', function($trail, $id) {
    $trail->parent('categories-list');
    $trail->push('لیست زیردسته‌ها', route('admin.subcategories.show', $id));
});

Breadcrumbs::for('subcategories-create', function($trail, $id) {
    $trail->parent('subcategories-list', $id);
    $trail->push('افزودن زیردسته‌ها');
});

Breadcrumbs::for('subcategories-edit', function($trail, $id) {
    $trail->parent('subcategories-list', $id);
    $trail->push('ویرایش زیردسته‌ها');
});

Breadcrumbs::for('evocatives-list', function($trail) {
    $trail->push('لیست فراخوان‌ها', route('admin.evocatives.index'));
});

Breadcrumbs::for('evocatives-create', function($trail) {
    $trail->parent('evocatives-list');
    $trail->push('افزودن فراخوان');
});

Breadcrumbs::for('evocatives-edit', function($trail) {
    $trail->parent('evocatives-list');
    $trail->push('ویرایش فراخوان');
});

Breadcrumbs::for('settings', function($trail){
    $trail->push('تنظیمات');
});