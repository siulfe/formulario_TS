<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('position')->unsigned();
            $table->integer('count');
            $table->integer('type_relation')->unsigned();
            $table->double('count_product',12,2);
            $table->integer('accesory_id')->unsigned();
            $table->integer('product_condition_id')->unsigned()->nullable();

            $table->foreign('accesory_id')->references('id')->on('accesories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculations');
    }
}
