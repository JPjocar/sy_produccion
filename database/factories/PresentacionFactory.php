<?php

namespace Database\Factories;

use App\Models\Presentacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentacion>
 */
class PresentacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Presentacion::class;

    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->name(),
            'cantidad' => $this->faker->randomNumber(1)
        ];
    }
}
