<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\NotificaProductoCreado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        // dd($productos);
        return view('/productos_todo/listado_producto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('viewAny', Producto::class);
        return view('/productos_todo/registro_producto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string',
            'fecha_vencimiento' => 'required',
            'stock' => 'required|integer',
            'archivo' => 'required|file|mimes:jpeg,png,gif,jpg',
        ], ['archivo.mimes' => 'El archivo debe ser una imagen con formato JPG, JPEG, PNG o GIF.',
        ]);

        if (!$request->file('archivo')->isValid()) {
            
        }
        
        //Se guarda la imagen en el directorio "public/img"
        $rutaImagen = $request->file('archivo')->store('public/img/');
        
        //Dimensionar la imagen:
        $imagen = Image::make(storage_path('app/' . $rutaImagen));
        $imagen->resize(800, 600); // Dimensiones deseadas
        
        // Guardar la imagen dimensionada
        $rutaDimensionada = 'public/img/' . $request->file('archivo')->getClientOriginalName();
        $imagen->save(storage_path('app/' . $rutaDimensionada));
        
        //Eliminar imagen no redimensionada:
        Storage::delete($rutaImagen);
        
        $request->merge([
            'archivo_nombre' => $request->file('archivo')->getClientOriginalName(),
            'archivo_ubicacion' => $rutaDimensionada,
        ]);
        //

        $producto = Producto::create($request->all());

        /* $producto = new Producto();

        //Producto::create($request->all()) Esto sirve sirve si los nombres coinciden con el de el form y la tabla de la base

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->stock = $request->stock;
        $producto->save(); */


        Mail::to($request->user())->send(new NotificaProductoCreado($producto));
        Session::flash('producto_agregado','El producto ha sido creado con exito');
        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {

        return view('/productos_todo/mostrar_productos', compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $this->authorize('viewAny', Producto::class);
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

        Session::flash('producto_editado','El producto ha sido editado con exito');
        return redirect('/producto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        // Obtener la ruta del archivo asociado
        $rutaArchivo = $producto->archivo_ubicacion;

        // Verificar si el archivo existe y eliminarlo
        if ($rutaArchivo && Storage::exists($rutaArchivo)) {
            Storage::delete($rutaArchivo);
        }

        Session::flash('producto_borrado','El producto ha sido borrado con exito');

        $this->authorize('viewAny', Producto::class);
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
