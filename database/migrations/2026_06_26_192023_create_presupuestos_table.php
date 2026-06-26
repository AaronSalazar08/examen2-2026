<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id(); // codigoPresupuesto
            $table->string('nombre_presupuesto');
            $table->foreignId('unidad_id')->constrained('unidads'); // Unidad (1) -> Presupuesto (1..*)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presupuestos');
    }
};
