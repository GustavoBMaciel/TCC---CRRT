<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('beneficiarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cnpj');
          $table->string('inscricaoestadual');
          $table->string('nome');
          $table->string('telefone');
          $table->string('endereco');
          $table->string('numero');
          $table->string('bairro');
          $table->string('complemento');
          $table->boolean('ativo');
          $table->string('email');
          $table->text('descricao');
          $table->string('assinatura');
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
        Schema::dropIfExists('beneficiarios');
    }
}
