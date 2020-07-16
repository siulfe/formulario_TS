<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoryInstalationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesory_instalation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('accesory_id')->unsigned();
            $table->integer('instalation_id')->unsigned();

            $table->foreign('accesory_id')->references('id')->on('accesories');
            $table->foreign('instalation_id')->references('id')->on('instalations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesory_instalation');
    }
}
