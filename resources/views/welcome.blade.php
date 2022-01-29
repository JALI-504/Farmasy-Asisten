

@extends('layouts.admin2')
@section('contenido')

@if(session('denegar'))
<div class="alert alert-danger">
    {{session('denegar')}}
</div>
@endif


@if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif


    <div class="col-12 text-center">
        <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
        @section('titulo')<h2 class="text-center font-italic font-weight-bold"> ¡Bienvenidos! </h2>@stop
        <br>
    </div>
    <br>
    @foreach([
    ["empleados", "clientes", "inventarios", "productos", "proveedores", "ventas", "usuarios", "compras"],
    ] as $modulos)
        <div class="col-12 pb-2">
            <div class="row">
                @foreach($modulos as $modulo)
                @can($modulo)
                    <div class="col-12 col-md-3">
                        <div class="card">
                        <div class="card-body">
                                <!--<input type="image"  width="200px" heigth="200px" src="/img/{{$modulo}}.png"/>-->
                                <a href="{{$modulo}}"><img src="/img/{{$modulo}}.png" width="200px" heigth="200px"/></a>
<br><br>
                                <a href="{{$modulo}}" class="btn textblack menusuperior" style="font-size:20px">
                                    Ir a&nbsp;{{$modulo === "acerca_de" ? "Acerca de" : ucwords($modulo)}}
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endcan
                @endforeach
            </div>
        </div>
    @endforeach
@stop
