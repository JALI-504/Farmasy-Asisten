<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 @section('titulo')<h2 class="text-center">Creación De Usuario</h2>@stop

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

    <br>

    <form method="post" action=""><!--Inicio de formulario-->
        @csrf


        <br><br>

        <div>
            <label for="empleado">Empleado:</label>
             <select class="form-control form-control-user" name='empleado' id='empleado' onchange="accion()">
                <option value="" style="display: none">Seleccione un Empleado</option>
                @foreach ($empleados as $empleado)
                    <option value="{{$empleado->id}}">{{$empleado->primer_nombre}} {{$empleado->segundo_nombre}} {{$empleado->primer_apellido}} {{$empleado->segundo_apellido}}</option>
                @endforeach
             </select>
    
            </div>

            <script>
                function accion(){
                    var select = document.getElementById('empleado').value;


                    @foreach ($empleados as $empleado)
                        if ({{$empleado->id}} == select){
                            document.getElementById('id_empleado').value = select;
                            document.getElementById('name').value = '{{$empleado->primer_nombre}} {{$empleado->segundo_nombre}} {{$empleado->primer_apellido}} {{$empleado->segundo_apellido}}';
                            document.getElementById('email').value = '{{$empleado->correo_electronico}}';
                        }                        
                    @endforeach

                }
            </script>

        <div class="form-group">
            <input require type="text" class="form-control" name='id_empleado' id='id_empleado' style="display: none"
            value="{{old('id_empleado')}}" readonly>
        </div>

        <div class="form-group">
            <input require type="text" class="form-control" name='name' id='name' style="display: none"
            value="{{old('name')}}" readonly>
        </div>       

        <div class="form-group">
            <label for="">Nombre de usuario:</label>
            <input require type="text" class="form-control" name="username" id="username"
            value="{{old('username')}}">
        </div>  

        <div class="form-group">
            <input require type="text" class="form-control" name="email" id="email" style="display: none"
            value="{{old('email')}}" readonly>
        </div> 

        <div class="form-group">
            <label for="">Contraseña:</label>
            <input require type="text" class="form-control" name="password" id="password"
            value="{{old('password')}}">
        </div>  

        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el usuario?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/usuario">
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
        <a type="button" class="btn-border btn-outline-success" href="/usuario">
        Volver
        </a>
        </button>

        </form><!--Final de formulario-->


@stop
