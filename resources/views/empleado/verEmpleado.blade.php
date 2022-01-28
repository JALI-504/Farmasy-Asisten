<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>


    @section('titulo')<h2 class="text-center">Nombre Del Empleado: {{$empleado->primer_nombre}} {{$empleado->primer_apellido}}</h2>@stop
    <table class="table table-striped table-hover table-success">
        <thead>

        </thead>
        <tbody>
        <tr>
            <th scope="row">Identidad</th>
            <td>{{$empleado->identidad}}</td>
        </tr>

        <tr>
            <th scope="row">Primer Nombre</th>
            <td>{{$empleado->primer_nombre}}</td>
        </tr>

        <tr>
            <th scope="row">Segundo Nombre</th>
            <td>{{$empleado->segundo_nombre}}</td>
        </tr>

        <th scope="row">Primer Apellido</th>
            <td>{{$empleado->primer_apellido}}</td>
        </tr>

        <tr>
            <th scope="row">Segundo Apellido</th>
            <td>{{$empleado->segundo_apellido}}</td>
            </tr>

            <tr>
            <th scope="row">Fecha de Nacimiento</th>
            <td>{{$empleado->fecha_nacimiento}}</td>
            </tr>

            <tr>
            <th scope="row">Número de Teléfono</th>
            <td>{{$empleado->numero_telefono}}</td>
            <tr>

            <th scope="row">Fecha de Entrada</th>
            <td>{{$empleado->fecha_entrada}}</td>
            </tr>

            <tr>
            <th scope="row">Correo</th>
            <td>{{$empleado->correo_electronico}}</td>
            </tr>

            <tr>
            <th scope="row">Dirección</th>
            <td>{{$empleado->direccion}}</td>
            </tr>

            <tr>
            <th scope="row">Cargo Del Empleado</th>
            <td>{{$empleado->cargo}}</td>
            </tr>

            <tr>
            <th scope="row">Número de Emergencia</th>
            <td>{{$empleado->numero_emergencia}}</td>
            </tr>
        </tbody>
    </table>

    <button class="btn-border btn-outline-primary">
        <a type="button" class="btn-border btn-outline-primary" href="/empleados">
        Volver
        </a>
    </button>

@stop
