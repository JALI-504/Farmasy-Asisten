
@extends('layouts.admin2')
@section('contenido')

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

  @section('titulo')<h2 class="text-center">Actualización Del Producto</h2>@stop

    @if(session('mensaje'))
        <div class="alert alert-danger">
            {{session('mensaje')}}
        </div>
    @endif

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

    <div >
        <div>
            <form method="POST" action="{{route("inventario.update", [$inventario])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label-bold">Código de barras</label>
                    <input required value="{{$inventario->codigo_barras}}" autocomplete="off" maxlength="130" name="codigo_barras"
                           class="form-control"
                           type="text" placeholder="Código de barras">
                </div>
                <div class="form-group">
                    <label class="label-bold">Nombre Producto</label>
                    <input required value="{{$inventario->nombre_producto}}" autocomplete="off" maxlength="30" id="nombre_producto" name="nombre_producto"
                           class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label-bold">Precio de compra</label>
                    <input required value="{{$inventario->precio_compra}}" autocomplete="off"maxlength="4" name="precio_compra"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label-bold">Precio de venta</label>
                    <input required value="{{$inventario->precio_venta}}" autocomplete="off" maxlength="4" name="precio_venta"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de venta">
                </div>

                <?php $fecha_actual = date("d-m-Y");?>
                <div class="form-group">
                    <label class="label-bold">Vencimiento</label>
                    <input required value="{{$inventario->vencimiento}}" autocomplete="off" name="vencimiento"
                           class="form-control"
                           type="date" placeholder=""
                           min="<?php echo date('Y-m-d');?>"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual." 5 year"));?>">
                </div>
                <div class="form-group">
                    <label class="label-bold">Existencia</label>
                    <input  value="{{$inventario->existencia}}" autocomplete="off" maxlength="9" name="existencia"
                           class="form-control"
                           type="number" placeholder="Existencia">
                </div>


                <div>
                <label form="presentacion">Presentación</label>
                    <select class="form-control form-control-user" name="presentacion" id="presentacion">
                        <option style="display:none">{{$inventario->presentacion}}</option>
                        <option>Tableta</option>
                        <option>Frasco</option>
                        <option>Ampolla</option>
                        <option>Capsula</option>
                        <option>Crema</option>
                        <option>Bolsa</option>
                        <option>Barra</option>
                    </select>    
                </div>

                <div class="form-group">
                    <label class="label-bold">Descripcion</label>
                    <input required value="{{$inventario->descripcion}}" name="descripcion" class="form-control"
                           type="text" placeholder="Descripcion">
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
                        <p>¿Desea guardar los cambios del producto?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn-border btn-outline-primary " href="/inventarios">
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
                    <a type="button" class="btn-border btn-outline-primary" href="/inventarios">
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


        </div>
    </div>
@stop

