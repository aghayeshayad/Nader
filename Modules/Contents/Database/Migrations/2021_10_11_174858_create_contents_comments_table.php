<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('آیدی کاربر');
            $table->unsignedBigInteger('content_id')->comment('آیدی مقاله');
            $table->unsignedBigInteger('author')->comment('نویسنده پاسخ');
            $table->unsignedBigInteger('editor')->nullable()->comment('ویرایشگر پاسخ');
            $table->text('comment') ->comment('دیدگاه');
            $table->text('answer')->nullable() ->comment('پاسخ');
            $table->tinyInteger('status')->default(0) -> comment('نمایش 1 / عدم نمایش 0');;
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable() ->comment('حذف کننده');;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('contents_comments');
    }
}
