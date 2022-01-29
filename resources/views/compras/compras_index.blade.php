@extends('layouts.admin2')
@section('contenido')

<div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable4 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>                   


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
<div >              
                    <?php 
                    $total = 0;
                    ?>
                    @foreach($compras as $compra)
                    <?php 
                    $total = $total +  $compra->total
                    ?>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total de compras</label>
                        <input type="number" class="form-control" name="fecha"  value="{{$total}}"  readonly>
                    </div>
                    

            @section('titulo')<h2 class="text-center">Lista de Compras</h2>@stop

            <br><br>
  
            <div class="table-responsive">
            <table id="mytable4" class="table table-striped table-hover table-success" id="b">
                
                    <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Total</th>
                        <th>Detalles</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($compras as $compra)
                        <tr>
                            <td>{{sprintf('%05d', $compra->id_factura)}}</td>
                            <td>{{$compra->created_at}}</td>
                            <td>{{$compra->proveedors->nombre}}</td>
                            <td>${{number_format($compra->total, 2)}}</td>

                            <td>
                            <a class="btn btn-success" href="{{route("compras.ver", $compra)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            
            
@stop
