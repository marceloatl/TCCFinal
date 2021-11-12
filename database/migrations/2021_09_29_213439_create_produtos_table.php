<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('codigo')->notNullable();
            $table->string('descricao')->notNullable();
            $table->string('estado')->notNullable();
            $table->string('condicao')->notNullable();
            $table->string('propriedade')->notNullable();
            $table->integer('quantidade')->unsigned()->notNullable();
            $table->string('local_origem')->notNullable();
            $table->string('local_estoque')->notNullable();
            $table->float('custo')->notNullable();
            $table->integer('status')->unsigned()->notNullable();
            $table->string('fornecedor')->notNullable();
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
