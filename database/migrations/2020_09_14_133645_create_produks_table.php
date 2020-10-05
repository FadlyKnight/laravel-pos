<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_category_id');
            $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('cascade');
        
            $table->string('name');
            $table->unsignedInteger('price');
            $table->unsignedInteger('sub_price');
            $table->unsignedInteger('stock');
            $table->string('image');
            $table->string('qrcode');
            $table->string('product_code')->nullable();
            $table->text('desc')->nullable();
            $table->text('gallery')->nullable();
            $table->string('status');
            $table->timestamps();

            // $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
