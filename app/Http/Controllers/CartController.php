<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        Session::flash('producto_agregado_cart','El producto ha sido agregado al carrito');
        return redirect()->route('producto.detalle', $producto->id)->with('success', 'Producto agregado al carrito');
    }

    public function mostrarCarrito()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener el carrito del usuario
        $carrito = $user->cart;

        // Obtener los productos en el carrito
        $productosEnCarrito = $carrito->productos;

        // Calcular el total
        $total = 0;
        foreach ($productosEnCarrito as $producto) {
            $total += $producto->precio * $producto->pivot->cantidad;
        }

        return view('/carritos_todo/showCart', compact('productosEnCarrito', 'total'));
    }
}
