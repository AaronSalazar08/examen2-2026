<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_unidads', function (Blueprint $table) {
            $table->id();                  // idMaterialUnidad en el dominio
            $table->integer('cantidad');
            $table->foreignId('material_id')->constrained('materials');
            $table->foreignId('unidad_id')->constrained('unidads');
            $table->foreignId('presupuesto_id')->constrained('presupuestos');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};