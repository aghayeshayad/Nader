<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title') -> comment('عنوان');
            $table->string('title_page') -> comment('عنوان صفحه');
            $table->string('slug') -> comment('اسلاگ');
            $table->text('meta_description') -> comment('توضیحات متا');
            $table->text('short_description')->nullable()->comment('توضیحات کوتاه');
            $table->longText('description')->nullable()->comment('توضیحات');
            $table->tinyInteger('status')->default(0) -> comment('نمایش 1 / عدم نمایش 0');
            $table->unsignedBigInteger('author')->nullable()->comment('نویسنده');
            $table->unsignedBigInteger('editor')->nullable()->comment('ویرایشگر');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->index()->nullable() -> comment('حذف کننده');
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
        Schema::dropIfExists('contents_tags');
    }
}
