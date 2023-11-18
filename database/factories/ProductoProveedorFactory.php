<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductoProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proveedorId = Proveedor::inRandomOrder()->first()->id;
        $productoId = Producto::inRandomOrder()->first()->id;

        return [
            'proveedor_id' => $proveedorId,
            'producto_id' => $productoId,
        ];
    }
}
