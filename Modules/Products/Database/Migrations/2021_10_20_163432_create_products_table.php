<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('sub_subcategory_id')->nullable();
            $table->string('title');
            $table->string('image');
            $table->longText('images')->nullable();
            $table->tinyInteger('vip');
            $table->tinyInteger('best_sellers');
            $table->tinyInteger('status');
            $table->integer('discount')->nullable();
            $table->integer('discount_count')->nullable();
            $table->longText('description');
            $table->timestamps();

            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();

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
        Schema::dropIfExists('products');
    }
}
