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
        // Genera la URL de la imagen aleatoria
        $imagenesAleatorias = $this->generarImagenesAleatorias(2);
        $imagenUrl = $imagenesAleatorias[0];

        return [
            'precio'=>fake()->randomDigit(),
            'descripcion'=>fake()->sentence(),
            'nombre'=>fake()->sentence(),
            'fecha_vencimiento'=>fake()->date(),
            'stock'=>fake()->randomDigit(),
            'imagen_url' => $imagenUrl,
        ];
    }

     /**
     * Genera imágenes aleatorias.
     *
     * @param int $cantidad
     * @return array
     */
    private function generarImagenesAleatorias($cantidad)
    {
        $imagenes = [];

        for ($i = 0; $i < $cantidad; $i++) {
            $terminosDeBusqueda = ["dulces", "candys"];
            $terminoAleatorio = $terminosDeBusqueda[array_rand($terminosDeBusqueda)];
            $imageSize = "800x600"; // Tamaño deseado de la imagen

            $imagenes[] = "https://source.unsplash.com/${imageSize}/?${terminoAleatorio}";
        }

        return $imagenes;
    }
}
