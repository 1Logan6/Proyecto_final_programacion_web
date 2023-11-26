<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Mail\DetallePedidoMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener el usuario autenticado
        // dd('Estás en el método store del PedidoController');
        $user = auth()->user();

        // Obtener el carrito del usuario
        $carrito = $user->cart;

        // Obtener los productos en el carrito
        $productosEnCarrito = $carrito->productos;

        // Calcular el total
        $total = 0;
        foreach ($productosEnCarrito as $producto) {
            $total += $producto->precio * $producto->pivot->cantidad;
        }

        // dd('Estás en el método store del PedidoController');
        // dd("Que pedo");

        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->user_id = $user->id;
        $pedido->total = $total;
        $pedido->save();

        // Asociar los productos al pedido y restar la cantidad del stock
        foreach ($productosEnCarrito as $producto) {
            $pedido->productos()->attach($producto->id, ['cantidad' => $producto->pivot->cantidad]);

            // Restar la cantidad de productos del stock
            $producto->stock -= $producto->pivot->cantidad;
            $producto->save();
        }

        // Desvincular los productos del carrito
        $carrito->productos()->detach();

        Mail::to($request->user())->send(new DetallePedidoMail($pedido));

        return redirect('/producto')->with('success', 'Pedido realizado con éxito');
    }

    public function mostrarPedidos()
    {

        $pedidosActivos = Pedido::with(['usuario:id,name', 'productos:id,nombre'])
            ->get();

        $pedidosEliminados = Pedido::onlyTrashed()
            ->with(['usuario:id,name', 'productos:id,nombre'])
            ->get();

        return view('/pedidos_todo/showPedido', compact('pedidosActivos', 'pedidosEliminados'));
    }

    public function marcarRecogido($pedidoId)
    {
        $pedido = Pedido::find($pedidoId);

        if ($pedido) {
            $pedido->delete(); // Esto hará un soft delete
            return redirect()->route('pedidos.mostrar')->with('success', 'Pedido marcado como recogido');
        }

        return redirect()->route('pedidos.mostrar')->with('error', 'Pedido no encontrado');
    }

    public function mostrarDetalle($pedidoId)
    {
        $pedido = Pedido::with(['usuario:id,name', 'productos:id,nombre'])->find($pedidoId);

        return view('/pedidos_todo/detallePedido', compact('pedido'));
    }

        public function mostrarDetalleR($pedidoId)
    {
        $pedido = Pedido::withTrashed()
        ->with(['usuario:id,name', 'productos:id,nombre'])
        ->find($pedidoId);

        return view('/pedidos_todo/detallePedidoRecogido', compact('pedido'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
