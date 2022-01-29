
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
                    @foreach($ventas as $venta)
                    <?php 
                    $total = $total +  $venta->total
                    ?>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total de Ventas</label>
                        <input type="number" class="form-control" name="fecha"  value="{{$total}}" readonly>
                    </div>
                    

            @section('titulo')<h2 class="text-center">Lista de Venta</h2>@stop

            <br><br>
  
            <div class="table-responsive">
            <table id="mytable4" class="table table-striped table-hover table-success" id="b">
                
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ticket de venta</th>
                        <th>Detalles</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{$venta->created_at}}</td>
                            <td>{{$venta->cliente->nombre}}</td>
                            <td>${{number_format($venta->total, 2)}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route("ventas.ticket", ["id"=>$venta->id])}}">
                            </td>

                            <td>
                            <a class="btn btn-success" href="{{route("ventas.ver", $venta)}}">
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
