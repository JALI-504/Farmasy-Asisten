@extends('layouts.admin2')
@section('contenido')

<div class="row">
        <div class="col-12">
            <h1 style="margin-left: 2%;">Detalle de Compra #{{$compra->id}}</h1>
            <h1 style="margin-left: 2%;">Compra: <small>{{$compra->proveedors->nombre}}</small></h1>
            
            
            <a style="margin-left: 2%;" class="btn btn-success" href="compras">
                Volver
            </a>
            <h2 style="margin-left: 2%;">Productos</h2>
            <table class="table table-bordered" style="margin-left: 2%;">
                <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>numero de Factura</th>
                    <th>Código de barras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($compra->inventario as $inven)
                    <tr>
                        <td>{{$inven->nombre_producto}}</td>
                        <td>{{$compra->factura}}</td>
                        <td>{{$inven->codigo_barras}}</td>
                        <td>${{number_format($inven->precio, 2)}}</td>
                        <td>{{$inven->cantidad}}</td>
                        <td>${{number_format($inven->cantidad * $inven->precio, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td><strong>Total</strong></td>
                    <td>${{number_format($total, 2)}}</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@stop
