<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 @section('titulo')<h2 class="text-center">Creación De Producto</h2>@stop

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
            <label for="codigo">Código:</label>
            <input type="text" class="form-control form-control-user" maxlength="5" name="codigo" id="codigo" value="{{old('codigo')}}"
            placeholder="#####">
<br>

        <!--Campo para ingresar el nombre-->
        <div class="form-group ">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="nombre" id="nombre" value="{{old('nombre')}}"
            placeholder="Ingrese el nombre del producto">
        </div>

        <!--Campo para seleccionar el impuesto-->
        <div>
            <label for="cargo">Tipo de Impuesto:</label>
             <select class="form-control form-control-user" name="impuesto" id="impuesto">
                <option value="0">Exento</option>
                <option value="15">Impuesto del 15%</option>
                <option value="18">Impuesto del 18%</option>
             </select>

            </div>

<br>
        <!--Campo para seleccionar la presentación-->
        <div>
        <label form="presentacion">Presentación</label>
            <select class="form-control form-control-user" name="presentacion" id="presentacion">
                <option style="display:none" value="">Seleccione la Presentación--></option>
                <option>Tableta</option>
                <option>Frasco</option>
                <option>Ampolla</option>
                <option>Capsula</option>
                <option>Crema</option>
                <option>Bolsa</option>
                <option>Barra</option>
            </select>    
        </div>

<br>
        <!--Campo para ingresar la descripcion-->
        <div class="form-group ">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="descripcion" id="descripcion" value="{{old('descripcion')}}"
            placeholder="Ingrese la descripción del producto">
        </div>


        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el producto?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/productos">
            Guardar
            </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>
<br>
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
        <a type="button" class="btn-border btn-outline-success" href="{{route("productos.index")}}">
        Volver
        </a>
        </button>

    </form>
@stop

