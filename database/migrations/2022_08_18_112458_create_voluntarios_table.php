<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 96);
            $table->date('data_de_nascimento');
            $table->string('cpf', 14);  
            $table->string('tipo_sanguineo', 3);
            $table->string('sexo');
            $table->string('endereco', 100);
            $table->string('cep', 9);
            $table->string('bairro');
            $table->string('municipio');
            $table->string('email');
            $table->string('nivel_intrucao');
            $table->string('complemento') -> nullable();
            $table->string('telefone', 15);
            $table->String('image') ->nullable();

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
        Schema::dropIfExists('voluntarios');
    }
}
