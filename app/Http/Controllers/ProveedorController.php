<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProveedorController extends Controller
{    //Función para ver todos los proveedores
    public function index(Request $request)
    {
        abort_if(Gate::denies('proveedores'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $proveedores = proveedor::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('proveedor/indexProveedor')//vista
        ->with('proveedor',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Función que permite la creación de nuevos proveedores
    public function create()
    {
        abort_if(Gate::denies('proveedor_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('proveedor/createProveedor');//retorna la vista asignada
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
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|digits:8',
            'nombre_laboratorio' => 'required',
            'telefono_laboratorio' => 'required|digits:8',
            'correo' => 'required',
            'nombre_vendedor' => 'required',
            'numero_vendedor' => 'required|digits:8',
            'direccion' => 'required',
        ]);
        $nuevoProveedor = new Proveedor();

        //formulario en el cual se envian los datos respectivos

        $nuevoProveedor->id = $request->input('id');
        $nuevoProveedor->nombre = $request->input('nombre');
        $nuevoProveedor->telefono = $request->input('telefono');
        $nuevoProveedor->nombre_laboratorio = $request->input('nombre_laboratorio');
        $nuevoProveedor->telefono_laboratorio = $request->input('telefono_laboratorio');
        $nuevoProveedor->correo = $request->input('correo');
        $nuevoProveedor->nombre_vendedor = $request->input('nombre_vendedor');
        $nuevoProveedor->numero_vendedor = $request->input('numero_vendedor');
        $nuevoProveedor->direccion = $request->input('direccion');


        $creado = $nuevoProveedor->save();

        if ($creado) {
            return redirect()->route('proveedores.index')
                ->with('mensaje', '¡El Proveedor fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
     //Función que permite mostrar los proveedores creados
    public function ver($id)//mostrar
    {
        abort_if(Gate::denies('proveedor_ver'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $proveedor = proveedor::findOrFail($id);
        return view('proveedor/verProveedor')->with('proveedores', $proveedor);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    //Función que permite editar a los proveedores creados y guardados
    public function edit($id)
    {
        abort_if(Gate::denies('proveedor_edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $proveedor = Proveedor::findOrFail($id);// parámetro ruta
        return view('proveedor/editProveedor')
            ->with('proveedor', $proveedor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedor  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //validaciones de los campos
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required|digits:8',
            'nombre_laboratorio' => 'required',
            'telefono_laboratorio' => 'required|digits:8',
            'correo' => 'required',
            'nombre_vendedor' => 'required',
            'numero_vendedor' => 'required|digits:8',
            'direccion' => 'required',
        ]);

        $proveedores = request()->except(['_token','_method']);
        Proveedor::where('id','=',$id)->update($proveedores);
        return redirect('/proveedores')->with('Mensaje', '¡Modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */

}

