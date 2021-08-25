<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autors', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150)->comment('Nome do autor');
            $table->string('ano_nascimento', 10)->comment('Data de nascimento do autor');;
            $table->string('sexo', 9)->comment('Gênero do autor');;
            $table->string('nacionalidade', 40)->comment('Nacionalidade do autor');;
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
        Schema::dropIfExists('autors');
    }
}
