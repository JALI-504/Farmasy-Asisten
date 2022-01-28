@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

@section('titulo')<h2 class="text-center">Nombre Del Producto: {{$producto->nombre}}</h2>@stop

<br>
<table class="table table-striped table-hover table-success">
    <thead>

        </thead>
        <tbody>
        <tr>
            <th scope="row">Código</th>
            <td>{{$producto->codigo}}</td>
        </tr>

        <tr>
            <th scope="row">Nombre</th>
            <td>{{$producto->nombre}}</td>
        </tr>

        
        <?php
            if($producto->impuesto==0){
                $men = 'Excento';
            }else{
                $men = $producto->impuesto.'%';
            }
            
            ?>

        <th scope="row">Tipo de Impuesto</th>
            <td>{{$men}}</td>
        </tr>

        <tr>
        <th scope="row">Presentación</th>
        <td>{{$producto->presentacion}}</td>
        <tr>

        <tr>
        <th scope="row">Descripción</th>
        <td>{{$producto->descripcion}}</td>
        <tr>
    </tbody>
</table>

<button class="btn-border btn-outline-primary">
    <a type="button" class="btn-border btn-outline-primary" href="/productos">
    Volver
    </a>
</button>

@stop
