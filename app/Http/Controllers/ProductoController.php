<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        // dd($productos);

        $imagenesAleatorias = $this->generarImagenesAleatorias(1);

        return view('//productos_todo/listado_producto', compact('productos', 'imagenesAleatorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/productos_todo/registro_producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required',
        //     'precio' => 'required',
        //     'descripcion' => 'required',
        //     'fecha_vencimiento' => 'required',
        //     'stock' => 'required',
        //     'archivo' => 'required|10000',
        // ]);
        
        if (!$request->file('archivo')->isValid()) {
            
        }
        
        $request->merge([
            'archivo_nombre' => $request->file('archivo')->getClientOriginalName(),
            'archivo_ubicacion' => $request->file('archivo')->store('public/img'),
        ]);

        Producto::create($request->all());

        /* $producto = new Producto();

        //Producto::create($request->all()) Esto sirve sirve si los nombres coinciden con el de el form y la tabla de la base

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->stock = $request->stock;
        $producto->save(); */
        

        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        $imagenesAleatorias = $this->generarImagenesAleatorias(1);

        return view('/productos_todo/mostrar_productos', compact('producto', 'imagenesAleatorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('/productos_todo/editar_producto', compact("producto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required',
            'stock' => 'required',
        ]);

        /* dd($request->all()); */
        Producto::where('id', $producto->id)
            ->update($request->except('_token', '_method'));

        /* $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->stock = $request->stock;

        $producto->save(); */

        return redirect('/producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }

    public function generarImagenesAleatorias($cantidad)
    {
        $imagenes = [];

        for ($i = 0; $i < $cantidad; $i++) {
            $terminosDeBusqueda = ["dulces", "candies", "sweets"];
            $terminoAleatorio = $terminosDeBusqueda[array_rand($terminosDeBusqueda)];
            $imageSize = "800x600"; // Tamaño deseado de la imagen

            $imagenes[] = "https://source.unsplash.com/${imageSize}/?${terminoAleatorio}";
        }

        return $imagenes;
    }

    public function descargar(Producto $producto)
    {
        return Sotrage::download($producto->archivo_ubicacion);
    }
}
