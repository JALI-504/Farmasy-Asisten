<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

  
 @section('titulo')<h2 class="text-center">Actualización Del Proveedor</h2>@stop

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


    <form method="post" action="{{route('proveedores.edit',['id'=>$proveedor->id])}}">
    <!--Inicio de formulario--> <!--recibimos el id para mostrar los datos del empleado seleccionado-->

    @method('put')
        @csrf

         <!--Campo para ingresar el primer nombre del proveedor-->
        <div class="form-group">
        <label for="nombre">Nombre Proveedor:</label>
            <input type="text" class="form-control form-control-user" maxlength="50" name="nombre" id="nombre"
             value="{{$proveedor->nombre}}">
        </div>

        <!--Campo para ingresar el telefono del proveedor-->
        <div class="form-group">
        <label for="telefono">Teléfono Proveedor:</label>
            <input type="tel" class="form-control form-control-user"maxlength="8" name="telefono" id="telefono"
             value="{{$proveedor->telefono}}">
        </div>

         <!--Campo para ingresar el primer nombre del proveedor-->
         <div class="form-group">
        <label for="nombre">Nombre de Laboratorio:</label>
            <input type="text" class="form-control form-control-user"maxlength="50" name="nombre_laboratorio" id="nombre_laboratorio"
             value="{{$proveedor->nombre_laboratorio}}">
        </div>

        <!--Campo para ingresar el telefono del proveedor-->
        <div class="form-group">
        <label for="telefono">Teléfono de Laboratorio:</label>
            <input type="tel" class="form-control form-control-user"maxlength="8" name="telefono_laboratorio" id="telefono_laboratorio"
             value="{{$proveedor->telefono_laboratorio}}">
        </div>

        <!--Campo para ingresar el correo electronico-->
        <div class="form-group">
        <label for="correo">Correo de Laboratorio:</label>
            <input type="email" class="form-control form-control-user"maxlength="50" name="correo" id="correo"
             value="{{$proveedor->correo}}">
        </div>

         <!--Campo para ingresar el primer nombre del vendedorr-->
        <div class="form-group">
        <label for="nombre_vendedor">Nombre Vendedor:</label>
            <input type="text" class="form-control form-control-user"maxlength="50" name="nombre_vendedor" id="nombre_vendedor"
             value="{{$proveedor->nombre_vendedor}}">
        </div>

        <!--Campo para ingresar el telefono del vendedor-->
        <div class="form-group">
        <label for="numero_vendedor">Número Vendedor:</label>
            <input type="text" class="form-control form-control-user" maxlength="8" name="numero_vendedor" id="numero_vendedor"
             value="{{$proveedor->numero_vendedor}}">
        </div>

        <!--Campo para ingresar la direccion-->
        <div class="form-group">
        <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user" maxlength="80" name="direccion" id="direccion"
             value="{{$proveedor->direccion}}">
        </div>

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
                <p class="font-italic font-bold">¿Desea guardar los cambios del Proveedor?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn-border btn-outline-primary " href="/proveedores">
           Guardar
            </button>
                <button type="button" class="btn-border btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <!--Boton Guardar-->
        <button type="button" class="btn-border btn-outline-primary" data-toggle="modal" data-target="#cambio">
            Actualizar
        </button>

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
                <p class="font-italic font-bold">¿Desea cancelar los cambios al Proveedor?</p>
            </div>
            <div class="modal-footer">
            <!--Boton para volver-->
           <a class="btn btn-outline-primary " href="/proveedores"> Aceptar</a>
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
