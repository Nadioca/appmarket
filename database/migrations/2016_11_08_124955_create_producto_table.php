<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //
        Schema::create('productos', function(Blueprint $table){
          $table->increments('id');
          $table->string('nombre',100);
          $table->decimal('precio',5,2);
          $table->integer('marca_id')->unsigned();

          //clave foranea
          //$table->primary('id'), lo pone por defecto laravel
          $table->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        //
        Schema::drop('productos');
    }
}
