
<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 @section('titulo')<h2 class="text-center">Creación De Proveedores</h2>@stop

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

    <form method="post" action=""><!--Inicio de formulario-->
        @csrf

        <!--Campo para ingresar el nombre-->
        <div class="form-group">
            <label for="nombre">Nombre Proveedor:</label>
            <input type="text" class="form-control form-control-user" maxlength="50" name="nombre" id="nombre"
            value="{{old('nombre')}}"placeholder="Ingrese el nombre del proveedor">
        </div>

        <!--Campo para ingresar el telefono-->
        <div class="form-group">
            <label for="telefono">Teléfono de Proveedor:</label>
            <input type="tel" class="form-control form-control-user"maxlength="8" name="telefono" id="telefono"
            value="{{old('telefono')}}"placeholder="Ingrese el número de telefono del Proveedor">
        </div>

        <div class="form-group">
            <label for="nombre">Nombre de Laboratorio:</label>
            <input type="text" class="form-control form-control-user"maxlength="50" name="nombre_laboratorio" id="nombre_laboratorio"
            value="{{old('nombre_laboratorio')}}"placeholder="Ingrese el nombre del laboratorio">
        </div>

        <!--Campo para ingresar el telefono-->
        <div class="form-group">
            <label for="telefono">Teléfono del Laboratorio:</label>
            <input type="tel" class="form-control form-control-user"maxlength="8" name="telefono_laboratorio" id="telefono_laboratorio"
            value="{{old('telefono_laboratorio')}}"placeholder="Ingrese el número de telefono del Laboratorio">
        </div>

        <!--Campo para ingresar el correo electronico-->
        <div class="form-group">
            <label for="correo">Correo de Laboratorio:</label>
            <input type="email" class="form-control form-control-user"maxlength="50" name="correo" id="correo"
            value="{{old('correo')}}"placeholder="Ingrese el correo electrónico">
        </div>

        <!--Campo para ingresar nombre vendedor-->
        <div class="form-group">
            <label for="nombre_vendedor">Nombre Vendedor:</label>
            <input type="text" class="form-control form-control-user"maxlength="50" name="nombre_vendedor" id="nombre_vendedor"
            value="{{old('nombre_vendedor')}}"placeholder="Ingrese el nombre del vendedor">
        </div>

        <!--Campo para ingresar el numero vendedor-->
        <div class="form-group">
            <label for="numero_vendedor">Número Vendedor:</label>
            <input type="text" class="form-control form-control-user"maxlength="8" name="numero_vendedor" id="numero_vendedor"
            value="{{old('numero_vendedor')}}"placeholder="########">
        </div>

        <!--Campo para ingresar la direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user" maxlength="80" name="direccion" id="direccion"
            value="{{old('direccion')}}"placeholder="Ingrese la dirección del vendedor">
        </div>

        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el proveedor?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/proveedores">
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
        <button type="reset" class="btn-border btn-outline-danger">
        Limpiar
        </button>

        <!--Boton para volver-->
        <button class="btn-border btn-outline-success">
        <a type="button" class="btn-border btn-outline-success" href="/proveedores">
        Volver
        </a>
        </button>

    </form>
@stop
