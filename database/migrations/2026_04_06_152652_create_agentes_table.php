<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agentes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('matricula')->unique();
            $table->string('tecnica');
            $table->string('equipe');
            $table->string('grau')->default(4);
            $table->string('tipo_sanguineo');
            $table->string('especializacao');
            $table->string('emissao');  
            $table->string('foto')->nullable(); 
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('agentes');
    }
};
