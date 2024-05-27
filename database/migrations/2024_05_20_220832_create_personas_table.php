<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("numero_documento",20);
            $table->unsignedBigInteger("tipo_documento_id");
            $table->string("nombres");
            $table->string("apellido_paterno");
            $table->string("apellido_materno");
            $table->string("celular");
            $table->char("sexo");
            $table->char("correo");
            $table->date("fecha_nacimiento");
            $table->text("direccion");
            $table->timestamps();
            $table->unsignedBigInteger("distrito_id");
            $table->foreign('tipo_documento_id')->references("id")->on("tipo_documentos");
            $table->foreign('distrito_id')->references("id")->on("distrito");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
