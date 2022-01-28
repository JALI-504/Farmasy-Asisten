
<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
@section('titulo')<h2 class="text-center">Creación De Clientes</h2>@stop

    <br>
    <!--Mensajes de error-->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--Inicio del Titulo-->
    <!--Final del Titulo-->

    <form method="post" action=""><!--Inicio de formulario-->
        @csrf

        <!--Campo para ingresar la identidad-->
        <div class="form-group">
            <label for="identidad">Identidad:</label>
            <input type="text" class="form-control form-control-user" maxlength="13" name="identidad" id="identidad"
            value="{{old('identidad')}}"placeholder="#############">


        <!--Campo para ingresar el nombre-->
        <div class="form-group ">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="nombre" id="nombre"value="{{old('nombre')}}"
            placeholder="Ingrese el nombre del cliente">
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Apellido:</label>
            <input type="text" class="form-control form-control-user"maxlength="30"
            name="apellido" id="apellido"value="{{old('apellido')}}"
            placeholder="Ingrese el  apellido del cliente">
        </div>


        <!--Campo para ingresar el telefono-->
        <div class="form-group ">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control form-control-user" maxlength="8" name="telefono" id="telefono"
            value="{{old('telefono')}}"placeholder="########">
        </div>

        <!--Campo para ingresar la direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user"maxlength="100"
            name="direccion" id="direccion"value="{{old('direccion')}}"
            placeholder="Ingrese la dirección del cliente">
        </div> 

        <div class="form-group">
            <label for="rtn">RTN:</label>
            <input type="text" class="form-control form-control-user"maxlength="50"
            name="rtn" id="direccion"value="{{old('rtn')}}"
            placeholder="Ingrese la RTN del cliente">
        </div>


        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el cliente?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/clientes">
            Guardar
            </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <!--Boton Guardar-->
        <button type="button" class="btn-border btn-outline-primary "
        data-toggle="modal" data-target="#cambio">
            Guardar
        </button>

        <!--Boton limpiar-->
        <!--Boton limpiar-->
        <button type="reset" class="btn-border btn-outline-danger">
            Limpiar
        </button>
        <!--Boton para volver-->
        <button class="btn-border btn-outline-success">
        <a type="button" class="btn-border btn-outline-success" href="{{route("ventas.store")}}">
        Volver
        </a>
        </button>

    </form>
@stop
