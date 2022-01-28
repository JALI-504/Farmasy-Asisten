@extends('layouts.admin2')

@section('contenido')
@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif

                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permisos</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                    @can('permission_create')
                      <a href="{{ route('permissions.create') }}" class="btn btn-primary">Añadir permiso</a>
                    @endcan
                    <a href="{{ route('welcome') }}" class="btn btn-success">volver</a>
                    <br>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                      <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                      </thead>
                      <tbody>
                        @forelse ($permissions as $permission)
                        <tr>
                          <td>{{ $permission->name }}</td>
                          <td class="td-actions text-right">
                            @can('permission_edit')
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning"><i
                                class="material-icons">editar</i></a>
                            @endcan
                            @can('permission_destroy')
                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">eliminar</i>
                              </button>
                            </form>
                            @endcan
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="2">Sin registros.</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer mr-auto">
                  {{ $permissions->links() }}
                </div>

@endsection
