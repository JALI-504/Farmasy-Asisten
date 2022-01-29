<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

  @section('titulo')<h2 class="text-center">Actualización Del Cliente</h2>@stop

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

    <form method="post" action="{{route('clientes.edit',['id'=>$cliente->id])}}">
    <!--Inicio de formulario--> <!--recibimos el id para mostrar los datos del empleado seleccionado-->

    @method('put')
        @csrf



        <div class="form-group">
            <label for="identidad">Identidad:</label>
            <input type="text" class="form-control form-control-user" maxlength="13" name="identidad" id="identidad"
             value="{{$cliente->identidad}}">
        </div>

        <!--Campo para ingresar el nombre-->
        <div class="form-group ">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="nombre" id="nombre" value="{{$cliente->nombre}}">
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Apellido:</label>
            <input type="text" class="form-control form-control-user"maxlength="30"
            name="apellido" id="apellido" value="{{$cliente->apellido}}">
        </div>

        <!--Campo para ingresar el telefono del proveedor-->
        <!--Campo para ingresar el telefono-->
        <div class="form-group ">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control form-control-user" maxlength="8" name="telefono" id="telefono"
            value="{{$cliente->telefono}}">
        </div>

        <!--Campo para ingresar la direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user"maxlength="100"
            name="direccion" id="direccion"
            placeholder="Ingrese la dirección del cliente" value="{{$cliente->direccion}}">
            </div>

            <div class="form-group">
            <label for="rtn">RTN:</label>
            <input type="text" class="form-control form-control-user"maxlength="50"
            name="rtn" id="rtn"
            placeholder="Ingrese la RTN del cliente" value="{{$cliente->rtn}}">
            </div>


        <!--Boton Guardar-->
        <button type="button" class="btn-border btn-outline-primary" data-toggle="modal" data-target="#cambio">
            Actualizar
        </button>
        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Cambios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea guardar los cambios del cliente?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn-border btn-outline-primary " href="/clientes">
           Guardar
            </button>
                <button type="button" class="btn-border btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <!--Boton limpiar-->
        <button type="reset" class="btn-border btn-outline-danger  ">
            Reestablecer
        </button>

        <div class="modal" id="cancelar"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cancelar Cambios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea cancelar los cambios en el cliente?</p>
            </div>
            <div class="modal-footer">
            <!--Boton para volver-->
            <button class="btn-border btn-outline-primary">
            <a type="button" class="btn-border btn-outline-primary" href="/clientes">
            Aceptar
            </a>
            </button>
                <button type="button" class="btn-border btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            </div>
        </div>
        </div>

           <!--Boton para volver-->
           <button type="button" class="btn-border btn-outline-success" data-toggle="modal" data-target="#cancelar">
            Volver
            </button>


        </form><!--Final de formulario-->




    @stop<!--Final del contenido-->
