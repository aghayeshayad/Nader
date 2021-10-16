<?php


namespace Modules\Contents\Http\Services;


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Modules\Contents\Entities\Category;

class ContentsService
{
    public function breadCrumbs()
    {
        /**
         * category List
         */

        Breadcrumbs::register('contents-home-categories', function ($trail) {
            $trail->push('دسته بندی ها', route('admin.contents-category.index', ['parent_id' => 0]));
        });

        Breadcrumbs::register('contents-list-categories', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
        });

        Breadcrumbs::register('contents-edit-categories', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
            $trail->push('ویرایش دسته بندی');
        });

        Breadcrumbs::register('contents-create-categories', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
            $trail->push('افزودن دسته بندی');
        });

        Breadcrumbs::register('contents-edit-home-categories', function ($trail) {
            $trail->parent('contents-home-categories');
            $trail->push('ویرایش دسته بندی');
        });

        Breadcrumbs::register('contents-create-home-categories', function ($trail) {
            $trail->parent('contents-home-categories');
            $trail->push('افزودن دسته بندی');
        });

##############################################################################################################

        Breadcrumbs::register('contents-list-contents', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
        });

        Breadcrumbs::register('contents-edit-contents', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
            $trail->push('ویرایش فروشگاه');
        });

        Breadcrumbs::register('contents-create-contents', function ($trail, $parent_id) {
            $cat = Category::findOrFail($parent_id);
            $path = explode('-', $cat->path);
            $trail->parent('contents-home-categories');
            if (count($path) >= 1) {
                $i = 0;
                while ($i < count($path)) {
                    $trail->push((Category::findOrFail($path[$i]))->title, route('admin.contents-category.index', ['parent_id' => $path[$i]]));
                    $i += 1;
                }
            }
            $trail->push('افزودن فروشگاه');
        });

        Breadcrumbs::register('contents-edit-home-contents', function ($trail) {
            $trail->parent('contents-home-categories');
            $trail->push('ویرایش فروشگاه');
        });

        Breadcrumbs::register('contents-create-home-contents', function ($trail) {
            $trail->parent('contents-home-categories');
            $trail->push('افزودن فروشگاه');
        });

##############################################################################################################

        /**
         * Tags list
         */
        Breadcrumbs::for('list-contents_tag', function ($trail) {
            $trail->push('لیست تگ ها', route('admin.contents-tags.index'));
        });

        /**
         * Tags edit
         */
        Breadcrumbs::for('edit-contents_tag', function ($trail) {
            $trail->parent('list-contents_tag');
            $trail->push('ویرایش تگ');
        });

        /**
         * Tags create
         */
        Breadcrumbs::for('create-contents_tag', function ($trail) {
            $trail->parent('list-contents_tag');
            $trail->push('افزودن تگ');
        });

#################################################################################################

        /**
         * comments list
         */
        Breadcrumbs::for('comments-list-comments', function ($trail) {
            $trail->push('لیست نظرات', route('admin.contents-comment.index'));
        });

    }
}
