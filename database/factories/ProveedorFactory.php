<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_completo'=>fake()->sentence(),
            'num_telefono'=>fake()->e164PhoneNumber(),
            'correo'=>fake()->email(),
            'direccion'=>fake()->sentence(),
            'nombre_empresa'=>fake()->sentence()
        ];
    }
}
