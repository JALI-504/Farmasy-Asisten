@extends('layouts.admin2')
@section('contenido')

<div class="row">
        <div class="col-12">
            <h1 class="text-center">Cambio de Clave<i class="fa fa-users"></i></h1>
            <form method="POST" action=" ">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$usuario->name}}" autocomplete="off" maxlength="80" name="name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Correo electrónico</label>
                    <input required value="{{$usuario->email}}" autocomplete="off" maxlength="50" name="email" class="form-control"
                           type="email" placeholder="Correo electrónico">
                </div>
                <div class="form-group">
                    <label class="label">Contraseña</label>
                    <input required value="{{$usuario->password}}" autocomplete="off" maxlength="20" name="password"
                           class="form-control"
                           type="password" placeholder="Contraseña">
                </div>

               
                <button class="btn btn-success">Guardar</button>
                
                <a class="btn btn-primary" href="{{route("usuario.index")}}">Volver</a>
            </form>
        </div>
    </div>
    @stop