<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
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
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('category')->onDelete('cascade');
            $table->string('name');
            $table->integer('amount');
            $table->float('unit_price');
            $table->float('promotion_price');
            $table->string('producter');
            $table->text('description');
            $table->tinyInteger('status');
            $table->tinyInteger('feauture');
            $table->timestamps();
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
