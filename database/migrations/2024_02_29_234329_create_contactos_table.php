<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('empresa_cliente');
            $table->date('fecha_ultima_modificacion');
            $table->string('correo');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('movil');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('cargo_id')->constrained('cargos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
