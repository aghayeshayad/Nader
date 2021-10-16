<?php

namespace Modules\Contents\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Contents\Entities\Category;

class ContentCategoryTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'اخبار و مقالات',
            'title_page' => 'اخبار و مقالات',
            'slug' => 'اخبار-مقالات',
            'meta_description' => 'اخبار و مقالات',
            'short_description' => 'اخبار و مقالات',
            'description' => 'اخبار و مقالات',
            'parent_id' => '0',
            'path' => '1',
            'order_by' => '1',
            'status' => '1',
        ]);
    }
}
