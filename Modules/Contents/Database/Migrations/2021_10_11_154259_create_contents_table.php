<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author')->comment('نویسنده');
            $table->unsignedBigInteger('editor')->nullable()->comment('ویرایش کننده');
            $table->unsignedBigInteger('category_id') -> comment('آیدی دسته بندی');
            $table->string('title') ->comment('عنوان');
            $table->string('title_page') -> comment('عنوان صفحه');
            $table->string('slug') -> comment('اسلاگ');
            $table->text('meta_description')-> comment('توضیحات متا');
            $table->longText('description')->nullable() ->comment('توضیحات');
            $table->text('short_description')->nullable() ->comment('توضیحات کوتاه');
            $table->string('image')->nullable() ->comment('تصویر');
            $table->text('images')->nullable() -> comment('تصاویر');
            $table->string('file')->nullable() -> comment('فایل');
            $table->string('link_video')->nullable() -> comment('لینک ویدئو');
            $table->timestamp('published_at')->comment('تاریخ انتشار');
            $table->tinyInteger('status')->default(0) ->comment('نمایش 1 / عدم نمایش 0');
            $table->integer('visit')->default(0) ->comment('بازدید');
            $table->integer('like')->default(0)->comment('لایک');;
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable() -> comment('حذف کننده');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('editor')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
