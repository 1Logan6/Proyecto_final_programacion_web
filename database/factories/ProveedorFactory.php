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
        // Genera la URL de la imagen aleatoria
        $imagenesAleatorias = $this->generarImagenesAleatorias(1);
        $imagenUrl = $imagenesAleatorias[0];

        return [
            'nombre_completo'=>fake()->sentence(),
            'num_telefono'=>fake()->phoneNumber(),
            'correo'=>fake()->email(),
            'direccion'=>fake()->sentence(),
            'nombre_empresa'=>fake()->sentence(),
            'prov_archivo_ubicacion' => $imagenUrl,
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
            $terminosDeBusqueda = ["logo", "logotipo", "Logo"];
            $terminoAleatorio = $terminosDeBusqueda[array_rand($terminosDeBusqueda)];
            $imageSize = "80x80"; // Tamaño deseado de la imagen

            $imagenes[] = "https://source.unsplash.com/${imageSize}/?${terminoAleatorio}";
        }

        return $imagenes;
    }
}
