<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosrempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produtosremps', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idProduto')->unsigned();
          $table->foreign('idProduto')->references('id')->on('produtos');
          $table->integer('idReciclagem')->unsigned();
          $table->foreign('idReciclagem')->references('id')->on('reciclagems');
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
        Schema::dropIfExists('produtorsemps');
    }
}
