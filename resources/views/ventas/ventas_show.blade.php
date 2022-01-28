
@extends('layouts.admin2')
@section('contenido')

<div class="row">
        <div class="col-12">
            <h1 style="margin-left: 2%;">Detalle de venta #{{$venta->id}}</h1>
            <h1 style="margin-left: 2%;">Cliente: <small>{{$venta->cliente->nombre}}</small></h1>
            
            <a style="margin-left: 2%;" class="btn btn-success" href="{{route("ventas.ticket", ["id" => $venta->id])}}">
                <i class="fa fa-print"></i>&nbsp;Ticket
            </a>
            <h2 style="margin-left: 2%;">Productos</h2>
            <table class="table table-bordered" style="margin-left: 2%;">
                <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Código de barras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($venta->inventario as $inven)
                    <tr>
                        <td>{{$inven->nombre_producto}}</td>
                        <td>{{$inven->codigo_barras}}</td>
                        <td>${{number_format($inven->precio, 2)}}</td>
                        <td>{{$inven->cantidad}}</td>
                        <td>${{number_format($inven->cantidad * $inven->precio, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>${{number_format($total, 2)}}</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@stop
