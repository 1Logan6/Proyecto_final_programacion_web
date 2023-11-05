<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }

    public function realizarVenta(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener el ID del producto (puedes pasar esto como parámetro en el request)
        $productId = $request->input('product_id');

        // Guardar la compra en la tabla de compras
        Venta::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);

        // Redireccionar a la página de productos
        return redirect('/producto');
    }

}
