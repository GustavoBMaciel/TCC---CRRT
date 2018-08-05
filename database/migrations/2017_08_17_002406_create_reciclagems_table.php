<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciclagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reciclagems', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('idUser')->unsigned();
          $table->foreign('idUser')->references('id')->on('users');
          $table->integer('idBeneficiario')->unsigned();
          $table->foreign('idBeneficiario')->references('id')->on('beneficiarios');
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
        Schema::dropIfExists('reciclagems');
    }
}
