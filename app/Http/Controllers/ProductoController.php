<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    //Variable que establece la forma en que se buscará

        abort_if(Gate::denies('productos'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));


        $producto= producto::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('producto/indexProducto')//vista
        ->with('productos',$producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('producto_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('producto/createProducto');//retorna la vista asignada
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validaciones de los campos asignados
       //validaciones de los campos asignados
       $request->validate([
        'codigo' => 'required|unique:productos',
        'nombre' => 'required',
        'impuesto' => 'required',
        'presentacion' => 'required',
        'descripcion' => 'required',

    ]);
        $nuevoProducto = new Producto();

        //formulario en el cual se envian los datos respectivos

        $nuevoProducto->codigo = $request->input('codigo');
        $nuevoProducto->nombre = $request->input('nombre');
        $nuevoProducto->impuesto = $request->input('impuesto');
        $nuevoProducto->presentacion = $request->input('presentacion');
        $nuevoProducto->descripcion = $request->input('descripcion');


        $creado = $nuevoProducto->save();

        if ($creado) {
            return redirect()->route('productos.index')
                ->with('mensaje', '¡El Producto fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('producto_show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $producto = Producto::findOrFail($id);
        return view('producto/showProducto')->with('producto', $producto);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('producto_edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $producto = Producto::findOrFail($id);// parámetro ruta
        return view('producto/editProducto')
            ->with('producto', $producto);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        //validaciones de los campos
        $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'impuesto' => 'required',
        'presentacion' => 'required',
        'descripcion' => 'required',

        ]);

        $producto = Producto::findOrFail($id);

        //formulario en el cual se envian los datos respectivos

        $producto->codigo = $request->input('codigo');
        $producto->nombre = $request->input('nombre');
        $producto->impuesto = $request->input('impuesto');
        $producto->presentacion = $request->input('presentacion');
        $producto->descripcion = $request->input('descripcion');

        $creado = $producto->save(); //$variable creada

        if ($creado) {
            return redirect()->route('productos.index')
                ->with('mensaje', '¡El producto fue modificado exitosamente!');
        } else {
            //retornar con un msj de error
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
