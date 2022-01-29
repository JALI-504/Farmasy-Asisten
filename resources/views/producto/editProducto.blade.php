<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

@section('titulo')<h2 class="text-center">Actualización Del Producto</h2>@stop

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

    <form method="post" action="{{route('productos.edit',['id'=>$producto->id])}}">
    <!--Inicio de formulario--> <!--recibimos el id para mostrar los datos del empleado seleccionado-->

    @method('put')
        @csrf



        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control form-control-user" maxlength="13" name="codigo" id="codigo"
             value="{{$producto->codigo}}">
        </div>

        <!--Campo para ingresar el nombre-->
        <div class="form-group ">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="nombre" id="nombre" value="{{$producto->nombre}}">
        </div>

         <!--Campo para ingresar el nombre-->

         <?php
            if($producto->impuesto==0){
                $men = 'Excento';
            }else{
                $men = $producto->impuesto.'%';
            }
            
            ?>

        <div class="form-group">
            <label for="cargo"> Tipo de Impuesto:</label>
            <select class="form-control form-control-user" name="impuesto" id="impuesto" value="{{$producto->impuesto}}">
                <option style="display:none" value="{{$producto->impuesto}}">{{$men}}</option>
                <option value="0">Exento</option>
                <option value="15">Impuesto del 15%</option>
                <option value="18">Impuesto del 18%</option>
             </select>
        </div>

        <!--Campo para ingresar el nombre-->
        <div>
        <label form="presentacion">Presentación</label>
            <select class="form-control form-control-user" name="presentacion" id="presentacion">
            <option style="display:none">{{$producto->presentacion}}</option>
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
            name="descripcion" id="descripcion" value="{{$producto->descripcion}}"
            placeholder="Ingrese la descripción del producto">
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
                <p>¿Desea guardar los cambios del producto?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn-border btn-outline-primary " href="/productos">
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
                <p>¿Desea cancelar los cambios en el producto?</p>
            </div>
            <div class="modal-footer">
            <!--Boton para volver-->
            <button class="btn-border btn-outline-primary">
            <a type="button" class="btn-border btn-outline-primary" href="/productos">
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
