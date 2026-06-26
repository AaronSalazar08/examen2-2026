<?php

namespace Database\Factories;

use App\Models\Presupuesto;
use App\Models\Unidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Presupuesto>
 */
class PresupuestoFactory extends Factory
{
    protected $model = Presupuesto::class;

    public function definition(): array
    {
        return [
            'nombre_presupuesto' => fake()->words(3, true),
            'unidad_id' => Unidad::factory(),
        ];
    }
}
