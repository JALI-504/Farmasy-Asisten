<!--Extendemos la plantilla para el formato a mostrar-->
<!--Extendemos la plantilla para el formato a mostrar-->
@extends('layouts.admin2')
@section('contenido')


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

  @section('titulo')<h2 class="text-center">Actualización De Empleados</h2>@stop

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


    <br><br>
    <form method="post" action="{{route('empleado.editar',['id'=>$empleados->id])}}">
        <!--Inicio de formulario--> <!--recibimos el id para mostrar los datos del empleado seleccionado-->

        @method('put')
        @csrf

        <br><br>

        <!--Campo para ingresar la identidad-->
        <div class="form-group">
            <label  for="identidad">Identidad:</label>
            <input type="text" class="form-control form-control-user" maxlength="13" name="identidad"
                   id="identidad" placeholder="####-####-#####  (13 Digitos)" value="{{$empleados->identidad}}">
        </div>

        <!--Campo para ingresar el primer nombre-->
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre:</label>
            <input type="text" class="form-control form-control-user" maxlength="30" name="primer_nombre"
                   id="primer_nombre" placeholder="Ingrese el primer nombre" value="{{$empleados->primer_nombre}}">
        </div>

        <!--Campo para ingresar el segundo nombre-->
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre:</label>
            <input type="text" class="form-control form-control-user" maxlength="30" name="segundo_nombre" id="segundo_nombre"
                   placeholder="Ingrese el segundo nombre" value="{{$empleados->segundo_nombre}}" >
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido:</label>
            <input type="text" class="form-control form-control-user" maxlength="30" name="primer_apellido" id="primer_apellido"
                   placeholder="Ingrese el primer apellido" value="{{$empleados->primer_apellido}}">
        </div>

        <!--Campo para ingresar el segundo nombre-->
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido:</label>
            <input type="text" class="form-control form-control-user" maxlength="30" name="segundo_apellido"
                   id="segundo_apellido" placeholder="Ingrese el segundo apellido" value="{{$empleados->primer_nombre}}">
        </div>

        <?php $fecha_actual = date("d-m-Y");?>

        <!--Campo para ingresar la fecha de nacimiento-->
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control form-control-user" name="fecha_nacimiento" id="fecha_nacimiento"
                    placeholder="Ingrese la fecha de nacimiento" value="{{$empleados->fecha_nacimiento}}"
                    min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
                    max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>">
        </div>

        <!--Campo para ingresar el numero de telefono-->
        <div class="form-group">
            <label for="numero_telefono">Número de Teléfono:</label>
            <input type="tel" class="form-control form-control-user" maxlength="8" name="numero_telefono" id="numero_telefono"
                   placeholder="######## (8 Digitos)" value="{{$empleados->numero_telefono}}">
        </div>

        <!--Campo para ingresar la fecha de entrada-->
        <div class="form-group">
            <label for="fecha_entrada">Fecha de entrada:</label>
            <input type="date" class="form-control form-control-user" name="fecha_entrada" id="fecha_entrada"
                   placeholder="Ingrese la fecha de entrada" value="{{$empleados->fecha_entrada}}" max="<?php echo date('Y-m-d');?>">
        </div>

        <!--Campo para ingresar el correo electronico-->
        <div class="form-group">
            <label for="correo_electronico">Correo Electrónico:</label>
            <input type="email" class="form-control form-control-user" maxlength="50" name="correo_electronico" id="correo_electronico"
                   placeholder="ingrese su correo electrónico" value="{{$empleados->correo_electronico}}">
        </div>

        <!--Campo para ingresar la direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user" maxlength="80" name="direccion" id="direccion"
                   placeholder="Ingrese la dirección" value="{{$empleados->direccion}}" >
        </div>

        <!--Campo para seleccionar el cargo-->

<div class="form-group">
        <label for="cargo"> Cargo:</label>
        <select class="form-control form-control-user" name="cargo" id="cargo" value="{{$empleados->cargo}}">
            <option style="display:none">{{$empleados->cargo}}</option>
            @foreach ($cargo as $c)
            <option value="{{$c->name}}">{{$c->name}}</option>
            @endforeach
		 </select>

		</div>

        <!--Campo para ingresar el numero de emergencia-->
        <div class="form-group">
            <label for="numero_emergencia">Número de emergencia:</label>
            <input type="tel" class="form-control form-control-user" maxlength="8" name="numero_emergencia" id="numero_emergencia"
                   placeholder="######## (8 Digitos)" value="{{$empleados->numero_emergencia}}">
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
                <p>¿Desea guardar los cambios en empleado?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn-border btn-outline-primary" href="/empleados">
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
                <p>¿Desea cancelar los cambios en empleado?</p>
            </div>
            <div class="modal-footer">
            <!--Boton para volver-->
            <button class="btn-border btn-outline-primary">
            <a type="button" class="btn-border btn-outline-primary" href="/empleados">
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
