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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->integer('habitacion');
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('documento');
            $table->text('descripcion');
            $table->dateTime('due_date')->nullable();
            $table->enum('status', ['Reservada', 'Ocupada', 'En salida'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
