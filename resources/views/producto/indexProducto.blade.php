<!--Extendemos la plantilla para el formato a mostrar-->
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

    <br>
    <!--Inicio de Titulo-->
    <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
    @section('titulo')<h2 class="text-center">Lista de Producto</h2>@stop
        <!--Final de Titulo-->

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable2 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>


      <div class="alert alert-primary" role="alert">

</div>

      <br>



    <div>
        <div style="float: left;">
            <a class="border border-primary btn btn-outline-primary md-2" href='productosnuevo'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> Nuevo Producto</a>
            <br>
        </div>

        <div style="float: right; padding-right: 30px">

        <input class="border btn btn-outline-dark  btn-lg ml-2" href="/empleados"  type="button" onclick="printDiv('areaImprimir')" value="imprimir" />

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

    <br><br>

     <!--Definimos la creacion de la tabla donde se veran los proveedores-->
    <table id="mytable2" class="table table-striped table-hover table-success">
        <thead>
        <!--Definimos los campos de la tabla-->
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de Impuesto</th>
            <th scope="col">Presentación</th>


            <!--Los campos han sido definidos-->
        </tr>
        </thead>
        <tbody>

        <!--Botón de imprimir solo era una prueba-->
        @forelse($productos ?? '' as $pro)<!--Definimos un forelse para recuperar los valores de cada proveedor-->
            <tr>

            <?php
            $mensaje = "Excento";
                if($pro->impuesto==15){
                    $mensaje = "15%";
                }else{
                    if($pro->impuesto==18){
                    $mensaje = "18%";
                    }
                }
            
            ?>

            <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td>{{$pro->codigo}}</td>
                <td>{{$pro->nombre}}</td>
                <td>{{$mensaje}}</td>
                <td>{{$pro->presentacion}}</td>


               <!--Definimos el boton de Editar-->
                <td>
                <a class="btn-border btn-outline-success btn-lg"
                href="{{route('productos.show',['id'=>$pro->id])}}">
                <i class="fa fa-info"></i></a>
                </td>
                <td>
                <a class="btn-border btn-outline-warning btn-lg"
                href="{{route('productos.edit',['id'=>$pro->id])}}"><i class="fa fa-edit"></i></a></td>
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row">No hay productos</th><!--Si la tabla esta vacia mostramos el mensaje no hay productos-->
            </tr>
        @endforelse<!--fin del forelse-->
        </script>
        </tbody>
    </table>

    {{$productos ?? ''->links()}}<!--variable proveedor del forelse-->

    <div  style="display: none;"  id="areaImprimir">

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    
    <div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <br>
    <!--Inicio de Titulo-->
    <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
    <h2 class="text-center">Lista de Producto</h2>
        <!--Final de Titulo-->
    <br><br>

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable2 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>

      <br><br>

      <div class="alert alert-primary" role="alert">

</div>

      <br>



    <div>
        

        <div style="float: right; padding-right: 30px">

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

    <br><br>

     <!--Definimos la creacion de la tabla donde se veran los proveedores-->
    <table id="mytable2" class="table table-striped table-hover table-success">
        <thead>
        <!--Definimos los campos de la tabla-->
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo de Impuesto</th>
            <th scope="col">Presentación</th>


            <!--Los campos han sido definidos-->
        </tr>
        </thead>
        <tbody>

        <!--Botón de imprimir solo era una prueba-->
        @forelse($productos ?? '' as $pro)<!--Definimos un forelse para recuperar los valores de cada proveedor-->
            <tr>

            <?php
            $mensaje = "Excento";
                if($pro->impuesto==15){
                    $mensaje = "15%";
                }else{
                    if($pro->impuesto==18){
                    $mensaje = "18%";
                    }
                }
            
            ?>

            <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td>{{$pro->codigo}}</td>
                <td>{{$pro->nombre}}</td>
                <td>{{$mensaje}}</td>
                <td>{{$pro->presentacion}}</td>

            </tr>
        @empty
            <tr>
                <th scope="row">No hay productos</th><!--Si la tabla esta vacia mostramos el mensaje no hay productos-->
            </tr>
        @endforelse<!--fin del forelse-->
        </script>
        </tbody>
    </table>

    {{$productos ?? ''->links()}}<!--variable proveedor del forelse-->



    </div>



    @stop<!--Fin de la seccion-->