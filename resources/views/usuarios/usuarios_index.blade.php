@extends('layouts.admin2')
@section('contenido')

<div class="row">
        <div class="col-12">
            <h1 class="text-center">Usuarios <i class="fa fa-users"></i></h1>
            <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable3 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>  
            <br><br>
           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Correo electrónico</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->username}}</td>
                            <td>{{$usuario->rol}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @stop