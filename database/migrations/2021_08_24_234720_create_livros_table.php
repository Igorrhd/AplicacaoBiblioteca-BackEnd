<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('autor', 150)->comment('Nome do autor do livro');;
            $table->string('genero_literario', 100)->comment('Gênero do livro');
            $table->string('editora', 100)->comment('Editora do livro');
            $table->string('titulo', 150)->comment('Titulo do livro');
            $table->string('ano_lancamento', 10)->comment('Ano de lançamento do livro');
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
        Schema::dropIfExists('livros');
    }
}
