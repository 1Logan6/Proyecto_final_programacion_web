<?php

use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/registro_producto', function (){
//     return view('/productos_todo/registro_producto');
// });

// Route::POST('/registro_producto', function (Request $request){
//     // $producto = new Producto();
//     // $producto->nombre = $request->nombre_prod;
//     // $producto->precio = $request->precio;
//     // $producto->save();
//     dd($request->all());
    
// });

Route::get('/producto/pdf/get', [ProductoController::class, 'pdf'])->name('producto.pdf');

Route::resource('producto',ProductoController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
