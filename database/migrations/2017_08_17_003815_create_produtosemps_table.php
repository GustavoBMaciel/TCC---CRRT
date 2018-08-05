<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produtosemps', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idProduto')->unsigned();
          $table->foreign('idProduto')->references('id')->on('produtos');
          $table->integer('idEmprestimo')->unsigned();
          $table->foreign('idEmprestimo')->references('id')->on('emprestimos');
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
        Schema::dropIfExists('produtosemps');
    }
}
