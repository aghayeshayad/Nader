<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('related_id')->index();
            $table->unsignedBigInteger('content_id')->index();
            $table->timestamps();
            $table->foreign('related_id')->references('id')->on('contents')->onDelete('cascade');
            $table->foreign('content_id')->references('id')->on('contents_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_contents');
    }
}
