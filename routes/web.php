<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoControlle;
use App\Http\Controllers\InventarioController;

use App\Http\Controllers\VentaController;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ComprarController;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RegistrarController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [GraficoController::class, 'welcome'])->name('welcome');


Route::middleware("auth")
    ->group(function () {

        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');

        Route::get('usuario',[UserController::class, 'index'])->name('usuario.index');

        Route::get('usuario{id}editar',[UserController::class,'edit'])->name('usuario.edit')
        ->where('id','[0-9]+');

        
    
    Route::put('usuario{id}editar',[UserController::class, 'update'])
    ->name('usuario.update')->where('id','[0-9]+');

    //Ruta guardar el nuevo usuario
Route::post('usuarionuevo',[UserController::class,'store']) ->name('usuario.store');



    //Ruta indice donde se vera la tabla
    Route::get('empleados',[EmpleadoController::class,'indice'])-> name('empleado.indice');
   // Ruta Detalles del Empleado
    Route::get('empleados{id}',[EmpleadoController::class,'ver'])->name('empleado.ver')->where('id','[0-9]+');

    //Ruta para crear nuevo empleado
    Route::get('empleadosnuevo',[EmpleadoController::class,'crearEmpleado']);

    //Ruta guardar el nuevo empleado
    Route::post('empleadosnuevo',[EmpleadoController::class,'guardarEmpleado'])
    ->name('empleado.guardar');

    //Ruta de editar el empleado
    Route::get('empleados{id}editar',[EmpleadoController::class,'editarEmpleado'])
    ->name('empleado.editar')->where('id','[0-9]+');

    //Ruta para actualizar y enviar datos al formulario de empleado
    Route::put('empleados{id}editar',[EmpleadoController::class, 'actualizarEmpleado'])
    ->name('empleado.actualizar')->where('id','[0-9]+');


//Ruta indice donde se vera la tabla
Route::get('proveedores/',[ProveedorController::class,'index'])-> name('proveedores.index');

// Ruta Detalles del Proveedor
Route::get('proveedores{id}',[ProveedorController::class,'ver'])->name('proveedores.ver')->where('id','[0-9]+');

//Ruta para crear nuevo proveedor
Route::get('proveedoresnuevo',[ProveedorController::class,'create'])-> name('proveedores.create');

//Ruta guardar el nuevo proveedor
Route::post('proveedoresnuevo',[ProveedorController::class,'store']) ->name('proveedores.store');

//Ruta de editar el producto
Route::get('proveedores{id}editar',[ProveedorController::class,'edit']) ->name('proveedores.edit')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('proveedores{id}editar',[ProveedorController::class, 'update'])->name('proveedores.update')
->where('id','[0-9]+');


//grupo de rutas para Productos

//Ruta indice donde se vera la tabla
Route::get('productos/',[ProductoControlle::class,'index'])-> name('productos.index');

//Ruta para crear nuevo producto
Route::get('productosnuevo',[ProductoControlle::class,'create'])-> name('productos.create');

//Ruta guardar el nuevo producto
Route::post('productosnuevo',[ProductoControlle::class,'store']) ->name('productos.store');

//Ruta de editar el producto
Route::get('productos{id}editar',[ProductoControlle::class,'edit']) ->name('productos.edit')->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('productos{id}editar',[ProductoControlle::class, 'update'])->name('productos.update')->where('id','[0-9]+');




//Ruta indice donde se vera la tabla
Route::get('inventarios/',[InventarioController::class,'index'])-> name('inventario.index');

//Ruta de editar el producto
Route::get('inventarios{id}editar',[InventarioController::class,'edit']) ->name('inventario.edit')->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('inventarios{id}editar',[InventarioController::class, 'update'])->name('inventario.update')->where('id','[0-9]+');

    //Ruta para crear nuevo producto
Route::get('inventariosnuevo',[InventarioController::class,'create'])-> name('inventario.create');

    //Ruta guardar el nuevo producto
Route::post('inventariosnuevo',[InventarioController::class,'store']) ->name('inventario.store');

Route::get('inventarios{id}',[InventarioController::class,'show'])->name('inventario.ver')->where('id','[0-9]+');



Route::get('ventas/',[VentaController::class,'index'])-> name('venta.index');

// Ruta Detalles del Proveedor
Route::get('ventas{venta}',[VentaController::class,'ver'])
->name('ventas.ver')->where('venta','[0-9]+');

        //Ruta para crear nuevo producto
 Route::get('ventasnuevo',[VentaController::class,'create'])-> name('ventas.create');

        //Ruta guardar el nuevo producto
Route::post('ventasnuevo',[VentaController::class,'store']) ->name('ventas.store');

//  rutas de controladores vender de vender

Route::get("/ventas/ticket",[VentaController::class, "ticket"])->name("ventas.ticket");

Route::post("/productoDeVenta",[VenderController::class, "agregarProductoVenta"])->name("agregarProductoVenta");
Route::get("/vender",[VenderController::class, "index"])->name("vender.index");
Route::delete("/productoDeVenta",[VenderController::class, "quitarProductoDeVenta"])->name("quitarProductoDeVenta");
Route::post("/terminarOCancelarVenta",[VenderController::class, "terminarOCancelarVenta"])->name("terminarOCancelarVenta");

Route::get("/compras/ticket",[CompraController::class, "ticket"])->name("compras.ticket");

Route::get('compras/',[CompraController::class,'index'])-> name('compra.index');
// Ruta Detalles del Proveedor
Route::get('compras{compra}',[CompraController::class,'ver'])
->name('compras.ver')->where('compra','[0-9]+');

  //Ruta para comprar nuevo producto
  Route::get('comprasnuevo',[CompraController::class,'create'])->name('compras.create');

    //Ruta guardar el nuevo producto comprado
Route::post('comprasnuevo',[CompraController::class,'store']) ->name('compras.store');

Route::post("/productoDeCompra",[ComprarController::class, "agregarProductoCompra"])->name("agregarProductoCompra");
Route::get("/comprar",[ComprarController::class, "index"])->name("comprar.index");
Route::delete("/productoDeCompra",[ComprarController::class, "quitarProductoDeCompra"])->name("quitarProductoDeCompra");
Route::post("/terminarOCancelarCompra",[ComprarController::class, "terminarOCancelarCompra"])->name("terminarOCancelarCompra");


//Ruta indice donde se vera la tabla
Route::get('clientes/',[ClienteController::class,'index'])-> name('clientes.index');

//Ruta para crear nuevo cliente
Route::get('clientesnuevo',[ClienteController::class,'create'])-> name('clientes.create');

//Ruta guardar el nuevo cliente
Route::post('clientesnuevo',[ClienteController::class,'store']) ->name('clientes.store');


//Ruta para crear nuevo cliente
Route::get('clientesnuevo2',[ClienteController::class,'create2'])-> name('clientes.create2');

//Ruta guardar el nuevo cliente
Route::post('clientesnuevo2',[ClienteController::class,'store2']) ->name('clientes.store2');

//Ruta de editar el cliente
Route::get('clientes{id}editar',[ClienteController::class,'edit']) ->name('clientes.edit')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de cliente
Route::put('clientes{id}editar',[ClienteController::class, 'update'])->name('clientes.update')
->where('id','[0-9]+');

Route::get('clientes{id}',[ClienteController::class,'show'])->name('clientes.show')->where('id','[0-9]+');


//Rutas producto
//Ruta indice donde se vera la tabla
Route::get('productos/',[ProductoController::class,'index'])-> name('productos.index');

//Ruta para crear nuevo producto
Route::get('productosnuevo',[ProductoController::class,'create'])-> name('productos.create');

//Ruta guardar el nuevo producto
Route::post('productosnuevo',[ProductoController::class,'store']) ->name('productos.store');

//Ruta de editar el producto
Route::get('productos{id}editar',[ProductoController::class,'edit']) ->name('productos.edit')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('productos{id}editar',[ProductoController::class, 'update'])->name('productos.update')
->where('id','[0-9]+');

Route::get('productos{id}',[ProductoController::class,'show'])->name('productos.show')->where('id','[0-9]+');        
    
    // Ruta Detalles del Empleado
     Route::get('empleados{id}',[EmpleadoController::class,'ver'])->name('empleado.ver')->where('id','[0-9]+');
 
     //Ruta para crear nuevo empleado
     Route::get('empleadosnuevo',[EmpleadoController::class,'crearEmpleado']);
 
     //Ruta guardar el nuevo empleado
     Route::post('empleadosnuevo',[EmpleadoController::class,'guardarEmpleado'])
     ->name('empleado.guardar');
 
     //Ruta de editar el empleado
     Route::get('empleados{id}editar',[EmpleadoController::class,'editarEmpleado'])
     ->name('empleado.editar')->where('id','[0-9]+');
 
     //Ruta para actualizar y enviar datos al formulario de empleado
     Route::put('empleados{id}editar',[EmpleadoController::class,'actualizarEmpleado'])
     ->name('empleado.actualizar')->where('id','[0-9]+');

     


//Rutas producto
//Ruta indice donde se vera la tabla

//Ruta para crear nuevo producto
Route::get('usuarios',[RegistrarController::class,'create'])-> name('usuarios.create');

//Ruta guardar el nuevo producto
Route::post('usuarios',[RegistrarController::class,'store']) ->name('usuarios.store');

//Ruta de editar el producto
Route::get('usuarios{id}editar',[RegistrarController::class,'edit']) ->name('usuarios.edit')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('usuarios{id}editar',[RegistrarController::class, 'update'])->name('usuarios.update')
->where('id','[0-9]+');

Route::get('usuarios{id}ver',[EmpleadoController::class,'editar']) ->name('usuarios.ver')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('usuarios{id}ver',[EmpleadoController::class, 'actualizar'])->name('usuarios.show')
->where('id','[0-9]+');


//Ruta indice donde se vera la tabla
Route::get('permissions/',[PermissionController::class,'index'])-> name('permissions.index');

//Ruta para crear nuevo producto
Route::get('permissionsnuevo',[PermissionController::class,'create'])-> name('permissions.create');

//Ruta guardar el nuevo producto
Route::post('permissionsnuevo',[PermissionController::class,'store']) ->name('permissions.store');

//Ruta de editar el producto
Route::get('permissions{id}editar',[PermissionController::class,'edit']) ->name('permissions.edit')
->where('id','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('permissions{id}editar',[PermissionController::class, 'update'])->name('permissions.update')
->where('id','[0-9]+');

Route::get('permissions{id}',[PermissionController::class,'show'])->name('permissions.show')->where('id','[0-9]+'); 

Route::delete('permissions{id}',[PermissionController::class,'delete'])->name('permissions.destroy')->where('id','[0-9]+');

//Ruta indice donde se vera la tabla
Route::get('roles/',[RoleController::class,'index'])-> name('roles.index');

//Ruta para crear nuevo producto
Route::get('rolesnuevo',[RoleController::class,'create'])-> name('roles.create');

//Ruta guardar el nuevo producto
Route::post('rolesnuevo',[RoleController::class,'store']) ->name('roles.store');

//Ruta de editar el producto
Route::get('roles{role}editar',[RoleController::class,'edit']) ->name('roles.edit')
->where('role','[0-9]+');

//Ruta para actualizar y enviar datos al formulario de producto
Route::put('roles{role}editar',[RoleController::class, 'update'])->name('roles.update')
->where('role','[0-9]+');

Route::get('roles{role}',[RoleController::class,'show'])->name('roles.show')->where('role','[0-9]+'); 

Route::delete('roles{role}',[RoleController::class,'delete'])->name('roles.destroy')->where('role','[0-9]+');

Route::resource('posts', PostController::class);

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
