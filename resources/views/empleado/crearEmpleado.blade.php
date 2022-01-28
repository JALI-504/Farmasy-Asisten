<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 @section('titulo')<h2 class="text-center">Creación De Empleados</h2>@stop

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


        <!--Campo para ingresar la identidad-->
        <div class="form-group">
            <label for="identidad">Identidad:</label>
            <input require type="text" class="form-control" maxlength="13" name="identidad" id="identidad"
            value="{{old('identidad')}}"placeholder="#############">
        </div>

        <!--Campo para ingresar el primer nombre-->
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre:</label>
            <input require type="text" class="form-control"maxlength="30" name="primer_nombre" id="primer_nombre"
            value="{{old('primer_nombre')}}" placeholder="Ingrese el primer nombre">
        </div>

        <!--Campo para ingresar el segundo nombre-->
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre:</label>
            <input require type="text" class="form-control form-control-user"maxlength="30" name="segundo_nombre" id="segundo_nombre"
            value="{{old('segundo_nombre')}}"placeholder="Ingrese el segundo nombre">
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido:</label>
            <input require type="text" class="form-control form-control-user"maxlength="30" name="primer_apellido" id="primer_apellido"
            value="{{old('primer_apellido')}}"placeholder="Ingrese el primer apellido">
        </div>

        <!--Campo para ingresar el segundo nombre-->

        <div class="form-group">
            <label for require="segundo_apellido">Segundo Apellido:</label>
            <input require type="text" class="form-control form-control-user" maxlength="30" name="segundo_apellido" id="segundo_apellido"
            value="{{old('segundo_apellido')}}"placeholder="Ingrese el segundo apellido">
        </div>

        <?php $fecha_actual = date("d-m-Y");?>

        <!--Campo para ingresar la fecha de nacimiento-->
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento:</label>
            <input require type="date" class="form-control form-control-user" name="fecha_nacimiento" id="fecha_nacimiento"
            value="{{old('fecha_nacimiento')}}"min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
             max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>">
        </div>

        <!--Campo para ingresar el numero de telefono-->
        <div class="form-group">
            <label for="numero_telefono">Número de Teléfono:</label>
            <input require type="tel" class="form-control form-control-user"maxlength="8" name="numero_telefono" id="numero_telefono"
            value="{{old('numero_telefono')}}"placeholder="######## (8 Digitos)">
        </div>

        <!--Campo para ingresar la fecha de entrada-->
        <div class="form-group">
            <label for="fecha_entrada">Fecha Entrada:</label>
            <input require type="date" class="form-control form-control-user" name="fecha_entrada" id="fecha_entrada"
            value="{{old('fecha_entrada')}}"
            max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>">
        </div>


        <!--Campo para ingresar el correo electronico-->
        <div class="form-group">
            <label for="correo_electronico">Correo:</label>
            <input require type="email" class="form-control form-control-user"maxlength="50" name="correo_electronico" id="correo_electronico"
            value="{{old('correo_electronico')}}"placeholder="Ingrese el correo electrónico">
        </div>

        <!--Campo para seleccionar el direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input require type="text" class="form-control form-control-user"maxlength="80" name="direccion" id="direccion"
            value="{{old('direccion')}}"placeholder="Ingrese su Direccion">
        </div>

        <!--Campo para seleccionar el cargo-->
        <div>
        <label for="cargo">Cargo:</label>
		 <select class="form-control form-control-user" name="cargo" id="cargo">
			@foreach ($cargo as $c)
                <option value="{{$c->name}}">{{$c->name}}</option>
            @endforeach
		 </select>

		</div>


        <!--Campo para ingresar el numero de emergencia-->
        <div class="form-group">
            <label for="numero_emergencia">Número de teléfono para emergencias:</label>
            <input require type="tel" class="form-control form-control-user" maxlength="8" name="numero_emergencia" id="numero_emergencia"
            placeholder="######## (8 Digitos)" value="{{old('numero_emergencia')}}"
            >
        </div>



        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el empleado?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/empleados">
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
        <a type="button" class="btn-border btn-outline-success" href="/empleados">
        Volver
        </a>
        </button>

        </form><!--Final de formulario-->


@stop
