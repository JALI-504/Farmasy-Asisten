@extends('layouts.admin2')
@section('contenido')

@if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif


    <div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
@section('titulo')<h2 class="text-center">Listado de Inventario</h2>@stop

<br><br>
    
    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable4 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>



    </form>

      <br><br>
    <!--Inicio de Titulo-->
    <div>
        <!--
        <div style="float: left;">
            <a class=" border btn btn-outline-primary  btn-lg ml-2"
            href='/inventariosnuevo'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
</svg>Crear un Producto</a>
            <br>
            <br>
        </div>
    -->
        <div style="float: right; padding-right: 30px">

        <input class="border btn btn-outline-dark  btn-lg ml-2"  type="button" onclick="printDiv('areaImprimir')" value="imprimir" />

        <script>
            function printDiv(nombreDiv) {
                var contenido= document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal= document.body.innerHTML;

                document.body.innerHTML = contenido;

                window.print();

                document.body.innerHTML = contenidoOriginal;
            }
        </script>

        </div>
     </div>
    <!--Definimos la creacion de la tabla donde se veran los empleados-->
    <br>

    <br>

            <div id="mytable4" class="table table-striped table-hover table-success">
                <table class="table table-striped table-hover table-success">
                    <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Nombre Producto</th>
                        <th>Fecha Vencimiento</th>
                        <th>Existencia</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        <th>Detalles Productos</th>
                        <th>Editar</th>

                   <!--  <th></th>
                        <th>Eliminar</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventarios as $inventario)
                        <tr>
                            <td>{{$inventario->codigo_barras}}</td>
                            <td>{{$inventario->nombre_producto}}</td>
                            <td>{{$inventario->vencimiento}}</td>
                            <td>{{$inventario->existencia}}</td>
                            <td>{{$inventario->precio_compra}}</td>
                            <td>{{$inventario->precio_venta}}</td>
                            <td>
                                <a class="btn-border btn-outline-success btn-lg" href="{{route('inventario.ver',['id'=>$inventario->id])}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>

                           <td>
                               <a class="btn-border btn-outline-warning btn-lg" href="{{route('inventario.edit',['id'=>$inventario->id])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="display: none;"  id="areaImprimir">

        <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
    <br>

        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Inventario</h3>
        <form class="d-flex">

        </form>

        <br/>

    <div class="table-responsive">
                <table id="mytable4" class="table table-striped table-hover table-success">
                    <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Nombre Producto</th>
                        <th>Fecha Vencimiento</th>
                        <th>Existencia</th>

                   <!--  <th></th>
                        <th>Eliminar</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inventarios as $inventario)
                        <tr>
                            <td>{{$inventario->codigo_barras}}</td>
                            <td>{{$inventario->nombre_producto}}</td>
                            <td>{{$inventario->vencimiento}}</td>
                            <td>{{$inventario->existencia}}</td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


    </div>
@stop
