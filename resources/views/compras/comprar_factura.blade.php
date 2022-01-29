
@extends('layouts.admin2')
@section('contenido')
@if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif
    <div>
        <div>

        @section('titulo')<h2 class="text-center">Nueva compra</h2>@stop
        <br>
        

        <div>
            <div class="row">
                <div class="col-12 col-md-6">
                <div class="form-group">
                        <label for="exampleFormControlSelect1">Nombre comprador</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value= "{{Auth::user()->name}}"  readonly>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Fecha de compra</label>
                        <input type="datetime" class="form-control" name="fecha"  value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                    </div>
                <div class="form-group">
                    </div>
                    <div class="modal fade" id="clienteModal" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <style>
                            h1{
                                color: black;
                            }
                            </style>
                            <div class="modal-content">
                            <div class="modal-body">
                                <form>
                                <h1 class="text-center font-italic font-weight-bold">Seleccione un proveedor</h1>
                                <a class=" border btn btn-outline-primary" href=" ">Nuevo proveedor</a></h2>
                                <br> <br>
                                <form>
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
                                </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function(){
                                        $("#search").keyup(function(){
                                            _this = this;
                                            $.each($("#mytable1 tbody tr"), function() {
                                                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                                                    $(this).hide();
                                                else
                                                    $(this).show();
                                            });
                                        });
                                    });
                                </script>

                                </form>
                                <br> <br>
                                <table  class="table table-striped table-hover table-success" id="mytable1" cellspacing="0" style="width: 100%;">
                                <thead>
                                <!--Definimos los campos de la tabla-->
                                <tr>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Nombre</th>
                                    
                                    <th></th>

                                    <!--Los campos han sido definidos-->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($proveedors as $pro)<!--Definimos un forelse para recuperar los valores de cada proveedor-->
                                    <tr>
                                    <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                                        <td >{{$pro->telefono}}</td>
                                        <td >{{$pro->nombre}}</td>
                                        

                                        <td>
                                        <button data-dismiss="modal"
                                        onclick="
                                        var inputNombre = document.getElementById('id_proveedor');
                                        inputNombre.value = '{{$pro->nombre}}'"
                                        class="btn btn-outline-success" value="{{$pro->id}}">
                                        Agregar
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                </table>
                                </form>
                                <form class="d-flex">
                        </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </form>

                    <form action="{{route("terminarOCancelarCompra")}}" method="post">
                        @csrf

                       <!-- <div>
                        <label for="id_cliente">Cliente</label>
                            <input required type="text" class="form-control"  name="id_cliente" id="id_cliente">
                            <br>
                            <button type="button" class=" btn-border btn-outline-primary btn-lg" data-toggle="modal" data-target="#clienteModal" data-whatever="@mdo">
                            Seleccione un cliente
                            </button>

                        </div>-->

                        <div class="form-group">

                            
                            <label for="factura">factura</label>
                                <input id="factura" autofocus name="factura" type="text" disabled
                                value="{{sprintf('%05d', $factura+1)}}" class="form-control" placeholder="Factura el numero de factura" style="width:45%">
                          </div>
                            <label for="id_proveedor">Proveedores</label>
                            <select required  class="form-control" name="id_proveedor" id="id_proveedor">
                                @foreach($proveedors as $proveedor)
                                       
                                    <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                @endforeach
                            </select>
                            <a class=" border btn btn-outline-primary" href=" ">Nuevo proveedor</a></h2>

                            

                        @if(session("inventarios") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn-border btn-success btn-lg">Terminar
                                    compra
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn-border btn-warning btn-lg">Cancelar
                                    compra
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarProductoCompra")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="codigo_barras">Código de barras</label>
                            <label for="cantidad" style="margin-left: 70px;">Cantidad</label>
                            <label for="cantidad" style="margin-left: 120px;">Precio de compra</label>
                            <div class="input-group">
                                <input id="codigo_barras" autocomplete="off" required autofocus name="codigo_barras" type="text"
                                    class="form-control" placeholder="Código de barras" style="width:30%">

                                <input id="cantidad" autocomplete="off" required autofocus name="cantidad" type="number"
                                    class="form-control" placeholder="cantidad" style="width:30%; margin-left: 5%;">

                                <input id="precio" autocomplete="off" required autofocus name="precio" type="number"
                                class="form-control" placeholder="Precio" style="width:30%; margin-left: 5%;">
                            <span class="input-group-btn">

                                
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="button" class="btn-border btn-success btn-lg btn-lg" data-toggle="modal" data-target="#productoModal"
                        data-whatever="@mdo" style="width:40%;">
                        Productos
                        </button>
                        <button type="submit" class="btn-border btn-success btn-lg" style="width:40%;">
                            Facturar El Producto
                        </button>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="productoModal" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <style>
                            h1{
                                color: black;
                            }
                            </style>
                            <div class="modal-content">
                            <div class="modal-body">
                                <form>
                                <h1 class="text-center font-italic font-weight-bold">Seleccione un Producto</h1>
                                <br> <br>
                                <form>
                                <div class="form-group">
                                    <input type="text" class="form-control pull-right" style="width:100%" id="search2" placeholder="Buscar">
                                </div>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function(){
                                        $("#search2").keyup(function(){
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

                                </form>
                                <br> <br>
                                <table  class="table table-striped table-hover table-success" id="mytable2" cellspacing="0" style="width: 100%;">
                                <thead>
                                <!--Definimos los campos de la tabla-->
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Presentación</th>
                                    <th scope="col">Copie el Código</th>

                                    <!--Los campos han sido definidos-->
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($productos as $pro)<!--Definimos un forelse para recuperar los valores de cada proveedor-->
                                    <tr>
                                    <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                                   <td id="{{$pro->codigo}}">
                                     {{$pro->codigo}}</td>
                                        <td>{{$pro->nombre}}</td>
                                        <td>{{$pro->presentacion}}</td>
                                        <td>
                                        <button data-dismiss="modal"
                                        onclick="
                                        var inputN = document.getElementById('codigo_barras');
                                        inputN.value = '{{$pro->codigo}}'"
                                        class="btn btn-outline-success" value="{{$pro->id}}">
                                        Agregar
                                        </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                </table>

                                </form>
                                <br><br>
                                <form class="d-flex">
                        </form>
                        <br><br>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div style="float: left; padding-left:20px">
                        <label for="exampleFormControlInput1">Tipo de Factura</label>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Crédito</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Contado</label>
                        </div>
                    </div>

                    </form>
                </div>

            </div>
            <?php $total = 0?>
            @if(session("inventarios") !== null)

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Código de barras</th>   
                            <th>Nombre del producto</th>     
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session("inventarios") as $inventario)
                        <tr>
                            <td>{{$inventario->codigo}}</td>
                            <td>{{$inventario->nombre}}</td>
                            <td>{{$inventario->cantidad}}</td>
                            <td>L. {{number_format($inventario->precio_compra, 2)}}</td>
                            <td>L. {{number_format($inventario->precio_compra * $inventario->cantidad, 2)}}</td>
                            <?php $total = $total + $inventario->precio_compra * $inventario->cantidad?>
                            </tr>
                        @endforeach
                </div>
            @else
                <h2>Aquí aparecerán los productos de la compra
                    <br>
                   al ingresar el codigo y precionar enter. <br><br>
                   
            @endif
                    <tr>
                        <td colspan="4" style='text-align:right; padding-right: 20px;'>
                            Sub Total
                        </td>
                        <td>
                            L. {{number_format($total/1.15, 2)}}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" style='text-align:right; padding-right: 20px;'>
                            Impuesto
                        </td>
                        <td>
                            L. {{number_format($total-($total/1.15), 2)}}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" style='text-align:right; padding-right: 20px;'>
                            Total a pagar
                        </td>
                        <td>
                            L. {{number_format($total, 2)}}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        </div>
    </div>

@stop