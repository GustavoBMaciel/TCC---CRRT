<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('produtos', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nome', 150);
      $table->integer('quantidade');
      $table->boolean('ativo');
      $table->string('imagem', 200);
      $table->enum('categoria',['reciclagem', 'emprestimo', 'emprestado', 'reciclado']);
      $table->text('descricao');
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
    Schema::dropIfExists('produtos');
  }
}
