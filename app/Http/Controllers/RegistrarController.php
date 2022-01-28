<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RegistrarController extends Controller
{    //Función para ver todos los proveedores

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Función que permite la creación de nuevos proveedores
    public function create()
    {
        abort_if(Gate::denies('registrar_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        return view('auth/register',
        [
            "empleados" => User::rightjoin('empleados', 'id_empleado', '=', 'empleados.id')->whereNull('id_empleado')->get(),
        ]);//retorna la vista asignada
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
            'id_empleado' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $nuevoUsuario = new User();

        //formulario en el cual se envian los datos respectivos

        $password = $request->input('password');
        $nuevapassword = Hash::make($password);

        $nuevoUsuario->id_empleado = $request->input('id_empleado');
        $nuevoUsuario->name = $request->input('name');
        $nuevoUsuario->username = $request->input('username');
        $nuevoUsuario->email = $request->input('email');
        $nuevoUsuario->password = $nuevapassword;


        $creado = $nuevoUsuario->save();

        if ($creado) {
            return redirect()->route('home')
                ->with('mensaje', '¡El Usuario fue creado exitosamente!');
        } else {
            //retornar con un msj de error

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    //Función que permite editar a los proveedores creados y guardados
    public function edit($id)
    {
        abort_if(Gate::denies('registrar_edit'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $user = User::findOrFail($id);// parámetro ruta
        return view('CambioClave')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        

        $request->validate([
            'oldpassword' => 'required', 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(Hash::check($request->oldpassword, Auth::user()->password)){


            $Usuario = User::findOrFail($id);

        $password = $request->input('password');
        $nuevapassword = Hash::make($password);

        $Usuario->password = $nuevapassword;


        $creado = $Usuario->save();

        if ($creado) {
            return redirect()->route('home')
                ->with('mensaje', '¡La contraseña fue modificada con exito!');
        } else {
            //retornar con un msj de error

        }

        }else{
            return redirect()->route('usuarios.edit',['id'=>Auth::user()->id])
                ->with('errorcambio', '¡Ingrese la contraseña anterio correctamente!');
        }
        
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\User  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('registrar_show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $user = User::findOrFail($id);
        return view('showUsuario')->with('user', $user);
        //
    }


}

