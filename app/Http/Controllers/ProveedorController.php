<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //return view('proveedores_todo/indexProveedor');
        $proveedores = Proveedor::all();
        return view('proveedores_todo/indexProveedor', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('viewAny', Proveedor::class);
        $prods = Producto::all();
        return view('proveedores_todo/createProveedor', compact('prods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre_completo' => 'required|max:255',
            'num_telefono' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required|string',
            'nombre_empresa' => 'required|string',
<<<<<<< HEAD
            'archivo' => 'required|file|mimes:jpg,jpeg,png,gif',
        ], ['archivo.mimes' => 'El archivo debe ser una imagen con formato JPG, JPEG, PNG o GIF.',
=======
>>>>>>> main
        ]);

        // Proveedor::create($request->all());

        if (!$request->file('archivo')->isValid()) {
            
        }
        
        //Se guarda la imagen en el directorio "public/img"
        $rutaImagen = $request->file('archivo')->store('public/img/');
        
        //Dimensionar la imagen:
        $imagen = Image::make(storage_path('app/' . $rutaImagen));
        $imagen->resize(80, 80); // Dimensiones deseadas
        
        // Cambiar el nombre del archivo por si se quiere utilizar la misma imagen que en el producto:
        $nombreOriginal = $request->file('archivo')->getClientOriginalName();
        $nuevoNombre = 'logo_' . $nombreOriginal;

        // Guardar la imagen dimensionada
        $rutaDimensionada = 'public/img/' . $nuevoNombre;
        $imagen->save(storage_path('app/' . $rutaDimensionada));
        
        //Eliminar imagen no redimensionada:
        Storage::delete($rutaImagen);
        
        $request->merge([
            'prov_archivo_nombre' => $request->file('archivo')->getClientOriginalName(),
            'prov_archivo_ubicacion' => $rutaDimensionada,
        ]);

        $prods = Proveedor::create($request->all());

        $prods->productos()->attach($request->producto_id);

        // return redirect('/proveedor');
        return redirect()->route('proveedor.index'); //Esto es mas facil que la forma de justo arriba
    }

    /**
     * Display the specified resource.
     */
    public function show(proveedor $proveedor)
    {
        //
        $this->authorize('view', $proveedor);
        return view('proveedores_todo.showProveedor', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(proveedor $proveedor)
    {
        //
        $prods = Producto::all();
        $this->authorize('viewAny', Proveedor::class);
        return view('proveedores_todo.editProveedor', compact('proveedor','prods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, proveedor $proveedor)
    {
        //
        $request->validate([
            'nombre_completo' => 'required|max:255',
            'num_telefono' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required|string',
            'nombre_empresa' => 'required|string',
        ]);

        Proveedor::where('id', $proveedor->id)
            ->update($request->except('_token','_method','producto_id'));
        
         // Actualizar los campos del proveedor
        $proveedor->update($request->except('_token','_method','producto_id'));

        // Actualizar la relación muchos a muchos con productos
        $proveedor->productos()->sync($request->producto_id);

        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(proveedor $proveedor)
    {
        // Obtener la ruta del archivo asociado
        $rutaArchivo = $proveedor->prov_archivo_ubicacion;

        // Verificar si el archivo existe y eliminarlo
        if ($rutaArchivo && Storage::exists($rutaArchivo)) {
            Storage::delete($rutaArchivo);
        }
        
        //
        $this->authorize('viewAny', Proveedor::class);
        $proveedor->delete();
        return redirect()->route('proveedor.index');
    }
}
