<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    //Variable que establece la forma en que se buscará

        abort_if(Gate::denies('clientes'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $cliente = cliente::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('clientes/indexCliente')//vista
        ->with('cliente',$cliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('cliente_create1'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('clientes/createCliente');//retorna la vista asignada
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        abort_if(Gate::denies('cliente_create2'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        return view('clientes/createCliente2');//retorna la vista asignada
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
        'identidad' => 'required|digits:13|unique:clientes',
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required|numeric|digits:8'
        
    ]);
        $nuevoCliente = new Cliente();

        //formulario en el cual se envian los datos respectivos

        $nuevoCliente->id = $request->input('id');
        $nuevoCliente->identidad = $request->input('identidad');
        $nuevoCliente->nombre = $request->input('nombre');
        $nuevoCliente->apellido = $request->input('apellido');
        $nuevoCliente->telefono = $request->input('telefono');
        $nuevoCliente->direccion = $request->input('direccion');
        $nuevoCliente->rtn =$request->input('rtn');

        $creado = $nuevoCliente->save();

        if ($creado) {
            return redirect()->route('clientes.index')
                ->with('mensaje', '¡El Cliente fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        //validaciones de los campos asignados
       //validaciones de los campos asignados
       $request->validate([
        'identidad' => 'required|digits:13|unique:clientes',
        'nombre' => 'required',
        'apellido' => 'required',
        'telefono' => 'required|numeric|digits:8'

    ]);
        $nuevoCliente = new Cliente();

        //formulario en el cual se envian los datos respectivos

        $nuevoCliente->id = $request->input('id');
        $nuevoCliente->identidad = $request->input('identidad');
        $nuevoCliente->nombre = $request->input('nombre');
        $nuevoCliente->apellido = $request->input('apellido');
        $nuevoCliente->telefono = $request->input('telefono');
        $nuevoCliente->direccion = $request->input('direccion');
        $nuevoCliente->rtn =$request->input('rtn');

        $creado = $nuevoCliente->save();

        if ($creado) {
            return redirect()->route('ventas.store')
                ->with('mensaje', '¡El Cliente fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('cliente_show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $cliente = Cliente::findOrFail($id);
        return view('clientes/showCliente')->with('cliente', $cliente);
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
        abort_if(Gate::denies('cliente_edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $cliente = Cliente::findOrFail($id);// parámetro ruta
        return view('clientes/editCliente')
            ->with('cliente', $cliente);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        //validaciones de los campos
        $request->validate([
            'identidad' => 'required|digits:13',
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|numeric|digits:8'

        ]);

        $cliente = Cliente::findOrFail($id);

        //formulario en el cual se envian los datos respectivos

        $cliente->identidad = $request->input('identidad');
        $cliente->nombre = $request->input('nombre');
        $cliente->telefono = $request->input('telefono');
        $cliente->apellido = $request->input('apellido');
        $cliente->direccion = $request->input('direccion');
        $cliente->rtn =$request->input('rtn');
        
        $creado = $cliente->save(); //$variable creada 

        if ($creado) {
            return redirect()->route('clientes.index')
                ->with('mensaje', '¡El cliente fue modificado exitosamente!');
        } else {
            //retornar con un msj de error
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
    
}
