<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('description');
            $table->string('unit');
            $table->integer('count');
            $table->integer('type_relation')->unsigned();
            $table->double('count_product');
            $table->text('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesories');
    }
}
