<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'precio'=>fake()->randomDigit(),
            'descripcion'=>fake()->sentence(),
            'nombre'=>fake()->sentence(),
            'fecha_vencimiento'=>fake()->date(),
            'stock'=>fake()->randomDigit()
        ];
    }
}
