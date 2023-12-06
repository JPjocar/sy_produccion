<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Producto::class;
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'stock' => 23,
            'estado' => 1,
            'precio' => $this->faker->numberBetween(0, 405),
            'id_marca' => 1,
            'id_presentacion' => 1,
            'id_tipo_producto' => $this->faker->numberBetween(1,2),
        ];
    }
}
