@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>


@section('titulo')<h2 class="text-center"> Nombre De Cliente: {{$cliente->nombre}} {{$cliente->apellido}}</h2>@stop
<br>
<table class="table table-striped table-hover table-success">
    <thead>

        </thead>
        <tbody>
        <tr>
            <th scope="row">Identidad</th>
            <td>{{$cliente->identidad}}</td>
        </tr>

        <tr>
            <th scope="row">Nombre</th>
            <td>{{$cliente->nombre}}</td>
        </tr>


        <th scope="row">Apellido</th>
            <td>{{$cliente->apellido}}</td>
        </tr>

        <tr>
        <th scope="row">Número de Teléfono</th>
        <td>{{$cliente->telefono}}</td>
        <tr>

        <tr>
        <th scope="row">Direccion</th>
        <td>{{$cliente->direccion}}</td>
        <tr>

        <tr>
        <th scope="row">RTN</th>
        <td>{{$cliente->rtn}}</td>
        <tr>
    </tbody>
</table>

<button class="btn-border btn-outline-primary">
    <a type="button" class="btn-border btn-outline-primary" href="/clientes">
    Volver
    </a>
</button>

@stop
