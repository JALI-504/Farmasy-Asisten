@extends('layouts.app')

@section('content')






                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="color: #FFFFFF;margin-left:150px" for="username" class="col-md-2 col-form-label text-md-right">
                            {{ __('Nombre del Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" maxlength="80" placeholder="Ingrese su nombre de usuario" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"
                                required autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Datos Incorrectos</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <br>
                        <div class="form-group row">
                            <label style="color: #FFFFFF;margin-left:150px"  for="password" class="col-md-2 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Ingrese su contraseña" maxlength="20" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Datos Incorrectos</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

<br>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-light btn-lg">
                                    {{ __('Entrar') }}
                                </button>
                                <!--
                                <a class="btn btn-outline-primary btn-lg" type=button href="{{route('register')}}">
                                {{ __('Registrarse') }}
                                </a>-->

                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-warning" href="{{ route('password.request') }}">
                                        {{ __('¿Se te olvidó la contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <br>
                <h2 class="">Mantener el cuerpo saludable es una obligación… <br> De lo contrario, no podemos mantener nuestra mente fuerte y clara.</h2>
                </div>




@endsection
