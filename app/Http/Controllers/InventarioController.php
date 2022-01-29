<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('inventarios'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $inventarios = inventario::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('inventario/inventarioindex')//vista
            ->with('inventarios', $inventarios);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('inventario_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('inventario/inventariocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'codigo_barras' => 'required|unique:inventarios',
            'nombre_producto' => 'required',
            'precio_compra' => 'required|digits_between:1,4',
            'precio_venta' => 'required|digits_between:1,4',
            'vencimiento' => 'required',
            'presentacion' => 'required',
            'descripcion' => 'required',


        ]);
        $nuevoInventario = new Inventario();

        //formulario en el cual se envian los datos respectivos

        $nuevoInventario->id = $request->input('id');
        $nuevoInventario->codigo_barras = $request->input('codigo_barras');
        $nuevoInventario->nombre_producto = $request->input('nombre_producto');
        $nuevoInventario->precio_compra = $request->input('precio_compra');
        $nuevoInventario->precio_venta = $request->input('precio_venta');
        $nuevoInventario->vencimiento = $request->input('vencimiento');
        $nuevoInventario->existencia = $request->input('existencia');
        $nuevoInventario->presentacion = $request->input('presentacion');
        $nuevoInventario->descripcion = $request->input('descripcion');




        if(($nuevoInventario->precio_compra)>($nuevoInventario->precio_venta)){
            return redirect()->route('inventario.create')
                ->with('mensaje', 'El precio de compra no puede ser mayor al precio de venta');
        }else{
            $creado = $nuevoInventario->save();
        }

        if ($creado) {
            return redirect()->route('inventario.index')
                ->with('mensaje', '¡El Producto fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('inventario_show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $inventario = Inventario::findOrFail($id);
        return view('inventario/inventariover')->with('inventario', $inventario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('inventario_edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $inventario = Inventario::findOrFail($id);// parametro ruta
        return view('inventario/inventarioedit')
            ->with('inventario', $inventario);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo_barras' => 'required',
            'nombre_producto' => 'required',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'vencimiento' => 'required',
            'presentacion' => 'required',
            'descripcion' => 'required',
        ]);

        $inventarios = request()->except(['_token','_method']);

        $nuevoInventario = new Inventario();
        $valor = $nuevoInventario->id = $request->input('id');
        $nuevoInventario->precio_compra = $request->input('precio_compra');
        $nuevoInventario->precio_venta = $request->input('precio_venta');

        if(($nuevoInventario->precio_compra)>($nuevoInventario->precio_venta)){
            return redirect()->route('inventario.edit',['id'=>$id])
                ->with('mensaje', '¡El precio de compra no puede ser mayor al precio de venta!');
        }else{
            Inventario::where('id','=',$id)->update($inventarios);
            return redirect('/inventarios')->with('Mensaje', '¡Modificado con exito!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(inventario $inventario)
    {
        //
    }
}
