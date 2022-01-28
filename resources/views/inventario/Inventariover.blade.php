<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')
<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

    @section('titulo')<h2 class="text-center">Detalles del Producto: {{$inventario->nombre_producto}}</h2>@stop
    <br>
    <div>
    <table class="table table-striped table-hover table-success">
        <thead>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Codigo De Barras</th>
            <td>{{$inventario->codigo_barras}}</td>
        </tr>
        <tr>
            <th scope="row">Nombre Del Producto</th>
            <td>{{$inventario->nombre_producto}}</td>
        </tr>


        <tr>
            <th scope="row">Precio De Compra</th>
            <td>{{$inventario->precio_compra}}</td>
        </tr>
        <th scope="row">Precio De Venta</th>
            <td>{{$inventario->precio_venta}}</td>
        </tr>
        <tr>
            <th scope="row">Fecha De Vencimiento</th>
            <td>{{$inventario->vencimiento}}</td>
            </tr>
            <tr>
            <th scope="row">Existencia</th>
            <td>{{$inventario->existencia}}</td>
            </tr>
            <tr>
            <th scope="row">Presentacion</th>
            <td>{{$inventario->presentacion}}</td>
            </tr>
            <tr>
            <th scope="row">Descripcion</th>
            <td>{{$inventario->descripcion}}</td>
            </tr>
            
        </tbody>
    </table>

    <button class="btn-border btn-outline-primary">
        <a type="button" class="btn-border btn-outline-primary" href="/inventarios">
        Volver
        </a>
    </button>
    </div>

@stop
