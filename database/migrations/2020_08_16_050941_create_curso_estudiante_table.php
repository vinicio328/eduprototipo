<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_estudiante', function (Blueprint $table) {
            $table->integer('curso_id')->unsigned();
            $table->integer('estudiante_id')->unsigned();
            $table->timestamps();
            $table->foreign('curso_id')->references('id')->on('cursos')
            ->onDelete('cascade');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_estudiante');
    }
}
