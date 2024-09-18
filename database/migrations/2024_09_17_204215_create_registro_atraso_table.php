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
        Schema::create('registro_atraso', function (Blueprint $table) {
            $table->id();
            $table ->timestamp('data_hora_chegada')->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_atraso');
    }
};
