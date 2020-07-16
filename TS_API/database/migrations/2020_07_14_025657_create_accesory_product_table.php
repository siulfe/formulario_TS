<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesory_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('accesory_id')->unsigned();
            $table->integer('product_id')->unsigned();

            $table->foreign('accesory_id')->references('id')->on('accesories');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesory_product');
    }
}
