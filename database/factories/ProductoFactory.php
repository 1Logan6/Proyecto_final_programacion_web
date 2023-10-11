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
            //aqui se pone los atributos de la tabla 
            //seguido de el fake con el tipo de dato a rellenar
            //los tipos de datos estan en la pagina de php faker
            'precio' => fake()->randomDigit(),
            'descripcion' => fake()->sentence(),
            'nombre' => fake()->sentence(),
            'fecha_vencimiento' => fake()->date(),
            'stock' => fake()->randomDigit()
            //
        ];
    }
}
