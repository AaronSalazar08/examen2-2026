<?php

namespace Database\Factories;

use App\Models\Requisicion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Requisicion>
 */
class RequisicionFactory extends Factory
{
    protected $model = Requisicion::class;

    public function definition(): array
    {
        return [
            'fecha' => fake()->dateTimeThisYear(),
            'estado' => fake()->randomElement(['pendiente', 'aprobada', 'rechazada']),
            'usuario_id' => User::factory(),
        ];
    }
}
