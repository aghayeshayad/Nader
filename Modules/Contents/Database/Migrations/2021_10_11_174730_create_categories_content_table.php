<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title') -> comment('عنوان');
            $table->string('title_page') -> comment('عنوان صفحه');
            $table->string('image')->nullable() -> comment('تصویر');
            $table->string('slug') -> comment('اسلاگ');
            $table->text('meta_description') -> comment('توضیحات متا');
            $table->text('short_description')->nullable()->comment('توضیحات کوتاه');
            $table->longText('description')->nullable()->comment('توضیحات');
            $table->string('parent_id')->default(0) -> comment('آیدی پدر');
            $table->string('path')->nullable() ->comment('مسیر');
            $table->string('order_by')->nullable()->comment('اولویت');
            $table->tinyInteger('status')->default(0) -> comment('نمایش 1 / عدم نمایش 0');
            $table->unsignedBigInteger('author')->nullable()->comment('نویسنده');
            $table->unsignedBigInteger('editor')->nullable()->comment('ویرایشگر');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable() ->comment('حذف کننده');
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('editor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_content');
    }
}
