<?php

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

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

Route::resource('producto', ProductoController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('venta', VentasController::class);
Route::resource('pedido', PedidoController::class);


Route::get('/producto/{id}', [ProductoController::class, 'detalle'])->name('producto.detalle');
Route::post('/agregar-al-carrito/{id}', [CartController::class, 'agregarAlCarrito'])->name('agregar-al-carrito');
Route::get('/carrito', [CartController::class, 'mostrarCarrito'])->name('carrito.mostrar');
Route::resource('pedidos', PedidoController::class)->only(['store']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
