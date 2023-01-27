<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntarioProfissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntario_profissao', function (Blueprint $table) {
            $table->id();

            $table->BigInteger('voluntario_id')->unsigned();
            $table->BigInteger('profissao_id')->unsigned();
            // $table->string('profissao_nome');

            $table->foreign('voluntario_id')->references('id')->on('voluntarios')->onDelete('cascade');
            $table->foreign('profissao_id')->references('id')->on('profissoes')->onDelete('cascade');
            
            $table->softDeletes();
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
        Schema::dropIfExists('voluntario_profissao');
    }
}
