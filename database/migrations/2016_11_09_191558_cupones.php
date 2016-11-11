<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cupones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cupons', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('numero');
          $table->string('estado');
          $table->integer('porcentaje');
          $table->integer('descuento');
          $table->text('vigencia');
          $table->text('tipo');
          $table->text('inicioVigencia');
          $table->integer('id_pedido');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('cupons');
    }
}
