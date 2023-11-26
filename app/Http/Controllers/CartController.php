<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function agregarAlCarrito(Request $request, $productoId)
    {
        // Obtener el producto
        $producto = Producto::findOrFail($productoId);

        $request->validate([
            'cantidad' => 'required|integer|min:1|max:' . $producto->stock,
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Asegurarse de que el carrito del usuario exista
        if (!$user->cart) {
            // Si no existe, crea un carrito
            $user->cart()->create([
                'user_id' => $user->id,
            ]);
        }

        // Obtener el carrito del usuario después de asegurarnos de que existe
        $carrito = $user->cart;

        // Agregar el producto al carrito con la cantidad especificada
        $carrito->productos()->attach($producto->id, ['cantidad' => $request->input('cantidad')]);

        $nuevoStock = $producto->stock - $request->input('cantidad');
        $producto->update(['stock' => $nuevoStock]);

        // Redireccionar a la vista del producto o a la página del carrito
        return redirect()->route('producto.detalle', $producto->id)->with('success', 'Producto agregado al carrito');
    }
}
