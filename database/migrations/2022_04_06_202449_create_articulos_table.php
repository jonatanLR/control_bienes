<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('ficha',45)->unique();
            $table->string('descripcion',150)->nullable();
            $table->string('marca',45)->nullable();
            $table->string('modelo',45)->nullable();
            $table->string('serie',45)->nullable();
            $table->string('inventario',45)->nullable();
            $table->string('ubicacion',150)->nullable();
            $table->string('estado',45)->nullable();
            $table->boolean('cargado')->default(false);
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('tipo_articulo_id')->constrained('tipo_articulos');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('articulos');
    }
}
