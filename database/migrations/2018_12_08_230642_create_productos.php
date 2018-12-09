<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {


            $table->increments('id');
            $table->string('sku');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('id_categoria');
            $table->integer('stock');
            $table->double('precio',8,2);
            $table->string('imagen');



       
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
