<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')
    <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
    @section('titulo')<h2 class="text-center"> Nombre Del Proveedor: {{$proveedores->nombre}}</h2>@stop

    <br>
    <table class=" table table-striped table-hover table-success">
        <thead>
        </thead>
        <tbody>
        <tr>

            <th scope="row">Nombre Del Proveedor</th>
            <td>{{$proveedores->nombre}}</td>
            </tr>

            <tr>
            <th scope="row">Nombre Del Laboratorio</th>
            <td>{{$proveedores->nombre_laboratorio}}</td>
        </tr>


        <tr>
            <th scope="row">Número De Teléfono</th>
            <td>{{$proveedores->telefono_laboratorio}}</td>
        </tr>
        <th scope="row">Correo Electronico</th>
            <td>{{$proveedores->correo}}</td>
        </tr>
        <tr>
            <th scope="row">Nombre Del Vendedor</th>
            <td>{{$proveedores->nombre_vendedor}}</td>
            </tr>
            <tr>
            <th scope="row">Telefono Del Vendedor</th>
            <td>{{$proveedores->numero_vendedor}}</td>
            </tr>
            <tr>
            <th scope="row">Dirección</th>
            <td>{{$proveedores->direccion}}</td>
            </tr>
        </tbody>
    </table>

    <button class="btn-border btn-outline-primary">
        <a class="btn-border btn-outline-primary" href="/proveedores">
        Volver
        </a>
    </button>

@stop
