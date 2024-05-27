<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('proyecto_nombre', 50)->nullable(false);
            $table->char('proyecto_estado', 1)->nullable(false);
            $table->integer('proyecto_prioridad')->nullable(false);
            $table->text('proyecto_direccion')->nullable(false);
            $table->decimal('proyecto_presupuesto', 10, 2)->nullable(false);
            $table->foreignId('distrito_id')->constrained('distrito');
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
        Schema::dropIfExists('proyecto');
    }
}
