<?php

namespace Database\Factories;

use App\Models\TipoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoProducto>
 */
class TipoProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TipoProducto::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement(['Producto_Final', 'Ingrediente'])
        ];
    }
}
