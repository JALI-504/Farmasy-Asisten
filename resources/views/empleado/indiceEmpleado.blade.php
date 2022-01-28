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


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

  @section('titulo')<h2 class="text-center">Lista de Empleados</h2>@stop

        <br><br>

        <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable3 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>                    


        <br><br>
    <!--Inicio de Titulo-->
    <div>
        <div style="float: left;">
            <a class=" border btn btn-outline-primary  btn-lg ml-2"
            href='/empleadosnuevo'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>Crear un Empleado</a>
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
    <!--Definimos la creacion de la tabla donde se veran los empleados-->

    <br>
    <br>
    <table id="mytable3" class="table table-striped table-hover table-success" id="b">

    <!--utilizamos un estilo personalizado mediante css para darle realse a la tabla-->
   <style>
   #b{
        border-collapse:separate;
        border: solid #ccc 1px;
        border-radius: 25px;
     }

    </style>
    <!--fin del estilo-->
       <br><!--espaceado-->

        <thead>
            <!--Definicmos los campos de la tabla-->
        <tr>
            <th scope="col">Identidad</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Número Teléfono</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Cargo</th>
            <th scope="col">Teléfono Emergencia</th>
            <th scope="col">Detalles</th>
            <th scope="col">Edición</th>
        </tr>
        <!--Los campos han sido definidos-->
        </thead>
        <tbody>
        @forelse($empleados as $empleado)<!--Definimos un forelse para recuperar los valores de cada empleado-->
            <tr>
                @if($empleado->id>1)
                <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td>{{$empleado->identidad}}</td>
                <td>{{$empleado->primer_nombre}}</td>
                <td>{{$empleado->segundo_nombre}}</td>
                <td>{{$empleado->primer_apellido}}</td>
                <td>{{$empleado->segundo_apellido}}</td>
                <td>{{$empleado->numero_telefono}}</td>
                <td>{{$empleado->correo_electronico}}</td>
                <td>{{$empleado->cargo}}</td>
                <td>{{$empleado->numero_emergencia}}</td>

                <td>
                   <a class="btn-border btn-outline-success btn-lg" href="{{route('empleado.ver',['id'=>$empleado->id])}}">
                        <i class="fa fa-info"></i></a>
                </td>

                <!--Definimos el boton de Editar-->
                <td><a class="btn-border btn-outline-warning btn-lg"
                href="{{route('empleado.editar',['id'=>$empleado->id])}}"><i class="fa fa-edit"></i></a></td>
                <td>

                </td>
                @endif
            </tr>
        @empty
            <tr>
                <th scope="row">No hay empleados</th><!--Si la tabla esta vacia mostramos el mensaje no hay empleados-->
            </tr>
        @endforelse<!--fin del forelse-->
        </tbody>
   </table>
    {{$empleados->links()}} <!--variable empleados del forelse-->

    <div  style="display: none;"  id="areaImprimir">

    @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif



<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 <br> <h3 class="text-center font-italic font-weight-bold">Lista De Empleados</h3>

         <br><br>
    <!--Inicio de Titulo-->
    <div>

     </div>
    <!--Definimos la creacion de la tabla donde se veran los empleados-->

    <br>
    <br>
    <table id="mytable3" class="table table-striped table-hover table-success" id="b">

    <!--utilizamos un estilo personalizado mediante css para darle realse a la tabla-->
   <style>
   #b{
        border-collapse:separate;
        border: solid #ccc 1px;
        border-radius: 25px;
     }

    </style>
    <!--fin del estilo-->
       <br><!--espaceado-->

        <thead>
            <!--Definicmos los campos de la tabla-->
        <tr>
            <th scope="col">Identidad</th>
            <th scope="col">Primer Nombre</th>
            <th scope="col">Segundo Nombre</th>
            <th scope="col">Primer Apellido</th>
            <th scope="col">Segundo Apellido</th>
            <th scope="col">Número Teléfono</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Cargo</th>
            <th scope="col">Teléfono Emergencia</th>
        </tr>
        <!--Los campos han sido definidos-->
        </thead>
        <tbody>
        @forelse($empleados as $empleado)<!--Definimos un forelse para recuperar los valores de cada empleado-->
            <tr>
                <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td>{{$empleado->identidad}}</td>
                <td>{{$empleado->primer_nombre}}</td>
                <td>{{$empleado->segundo_nombre}}</td>
                <td>{{$empleado->primer_apellido}}</td>
                <td>{{$empleado->segundo_apellido}}</td>
                <td>{{$empleado->numero_telefono}}</td>
                <td>{{$empleado->correo_electronico}}</td>
                <td>{{$empleado->cargo}}</td>
                <td>{{$empleado->numero_emergencia}}</td>

            </tr>
        @empty
            <tr>
                <th scope="row">No hay empleados</th><!--Si la tabla esta vacia mostramos el mensaje no hay empleados-->
            </tr>
        @endforelse<!--fin del forelse-->
        </tbody>
   </table>
    {{$empleados->links()}} <!--variable empleados del forelse-->



    </div>


@stop
