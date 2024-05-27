<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->id();
            $table->text('contrato_descripcion')->nullable(false);
            $table->date('contrato_fecha_firma')->nullable(false);
            $table->date('contrato_fecha_inicio')->nullable(false);
            $table->date('contrato_fecha_fin')->nullable(false);
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('proyecto_id')->constrained('proyecto');
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
        Schema::dropIfExists('contrato');
    }
}
