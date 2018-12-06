<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           Schema::create('productos', function (Blueprint $table){

             $table->increments('id');
            $table->string('sku');
            $table->string('nombre');
            $table->string('description');
            $table->string('id_categoria');
            $table->string('stock');
            $table->integer('precio');

           
        


           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('productos');
    }
}
