<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmpleadoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Función para ver todos los empleados
     public function indice(Request $request)
     {
        abort_if(Gate::denies('empleados'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));


            $empleados = empleado::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        

        return view('empleado/indiceEmpleado')//vista
            ->with('empleados', $empleados);//ruta y variable creada

    }
       //Función que establece la crecaión de los empleados
    public function crearEmpleado()
    {  
        abort_if(Gate::denies('empleado_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $cargo = Role::all();
        return view('empleado/crearEmpleado')->with('cargo', $cargo);//retorna la vista
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
       //Función que permite guaradar los empleados
    public function guardarEmpleado(Request $request)// store
    {

        //validacion de los campos en la creación de los empleados
        $request->validate([
            'identidad' => 'required|digits:13|unique:empleados',
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'numero_telefono' => 'required|digits:8',
            'fecha_entrada' => 'required',
            'correo_electronico' => 'required|unique:empleados|email:filter',
            'direccion' => 'required',
            'cargo' => 'required',
            'numero_emergencia' => 'required|digits:8'
        ]);
        $nuevoEmpleado = new empleado();//Variable y modelo

        ////formulario que muestra el envió de los datos
        
        $nuevoEmpleado->id = $request->input('id');
        $nuevoEmpleado->identidad = $request->input('identidad');
        $nuevoEmpleado->primer_nombre = $request->input('primer_nombre');
        $nuevoEmpleado->segundo_nombre = $request->input('segundo_nombre');
        $nuevoEmpleado->primer_apellido = $request->input('primer_apellido');
        $nuevoEmpleado->segundo_apellido = $request->input('segundo_apellido');
        $nuevoEmpleado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $nuevoEmpleado->numero_telefono = $request->input('numero_telefono');
        $nuevoEmpleado->fecha_entrada = $request->input('fecha_entrada');
        $nuevoEmpleado->correo_electronico = $request->input('correo_electronico');
        $nuevoEmpleado->direccion = $request->input('direccion');
        $nuevoEmpleado->cargo = $request->input('cargo');
        $nuevoEmpleado->numero_emergencia = $request->input('numero_emergencia');


        $creado = $nuevoEmpleado->save();//Se guardan los campos

        if ($creado) {
            return redirect()->route('empleado.indice')
                ->with('mensaje', '¡El Empleado fue Creado Exitosamente!');
        } else {
            //retornar con un msj de error
    
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        abort_if(Gate::denies('empleado_ver'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $empleado = empleado::findOrFail($id);
        return view('empleado/verEmpleado')->with('empleado', $empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */

     //Función que permite editar los datos de los empleados
    public function editarEmpleado($id)
    {
        abort_if(Gate::denies('empleado_editar'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
        $empleados = empleado::findOrFail($id);// parametro ruta
        $cargo = Role::all();
        return view('empleado/editarEmpleado')
            ->with('empleados', $empleados)
            ->with('cargo', $cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
//Actualizacion de los datos del empleado
    public function actualizarEmpleado(Request $request, $id)
    {

        $request->validate([
            'identidad' => 'required|digits:13',
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'numero_telefono' => 'required|digits:8',
            'fecha_entrada' => 'required',
            'correo_electronico' => 'required|email:filter',
            'direccion' => 'required',
            'cargo' => 'required',
            'numero_emergencia' => 'required|digits:8',
        ]);
        //
        //creamos la variable empleado
        $empleados = empleado::findOrFail($id);

        //enviamos los datos
        $empleados->identidad = $request->input('identidad');
        $empleados->primer_nombre = $request->input('primer_nombre');
        $empleados->segundo_nombre = $request->input('segundo_nombre');
        $empleados->primer_apellido = $request->input('primer_apellido');
        $empleados->segundo_apellido = $request->input('segundo_apellido');
        $empleados->fecha_nacimiento = $request->input('fecha_nacimiento');
        $empleados->numero_telefono = $request->input('numero_telefono');
        $empleados->fecha_entrada = $request->input('fecha_entrada');
        $empleados->correo_electronico = $request->input('correo_electronico');
        $empleados->direccion = $request->input('direccion');
        $empleados->cargo = $request->input('cargo');
        $empleados->numero_emergencia = $request->input('numero_emergencia');


        $creado = $empleados->save(); //$variable creada 

        if ($creado) {
            return redirect()->route('empleado.indice')
                ->with('mensaje', '¡El Empleado fue modificado exitosamente!');
        } else {
            //retornar con un msj de error
        }
        
    }




     //Función que permite editar los datos de los empleados
     public function editar($id)
     {
        abort_if(Gate::denies('usuario_show'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));
         $empleados = empleado::findOrFail($id);// parametro ruta
         return view('showUsuario')
             ->with('empleados', $empleados);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\empleado  $empleado
      * @return \Illuminate\Http\Response
      */
 //Actualizacion de los datos del empleado
     public function actualizar(Request $request, $id)
     {
            $request->validate([
            
            'numero_telefono' => 'required|digits:8',
            'correo_electronico' => 'required|email:filter',
            'direccion' => 'required',
            'numero_emergencia' => 'required|digits:8',
        ]);
        //
        //creamos la variable empleado
        $empleados = empleado::findOrFail($id);

        //enviamos los datos
        $empleados->numero_telefono = $request->input('numero_telefono');
        $empleados->correo_electronico = $request->input('correo_electronico');
        $empleados->direccion = $request->input('direccion');
        $empleados->numero_emergencia = $request->input('numero_emergencia');


        $creado = $empleados->save(); //$variable creada 

        if ($creado) {
            return redirect()->route('home')
                ->with('mensaje', '¡Los datos fueron actualizados exitosamente!');
        } else {
            //retornar con un msj de error
        }



     }





}
