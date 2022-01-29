@extends('layouts.admin2')

@section('contenido')
@if(session('mensaje'))
<div class="alert alert-success">
    {{session('mensaje')}}
</div>
@endif


          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                @can('role_create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Añadir nuevo rol</a>
                @endcan
                <a href="{{ route('welcome') }}" class="btn btn-success">volver</a>
                <br>
              </div>
            </div>
              <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                  <th class="text-center"> Nombre </th>
                  <th class="text-center" style="width: 70%"> Permisos </th>
                  <th class="text-center"> Acciones </th>
                </thead>
                <tbody>
                  @forelse ($roles as $role)
                  <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                      @forelse ($role->permissions as $permission)
                          <span class="badge badge-info">{{ $permission->name }}</span>
                      @empty
                          <span class="badge badge-danger">No permission added</span>
                      @endforelse
                    </td>
                    <td>
                    @can('role_edit')
                      @if ($role->id != 1)
                      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-success"> <i
                        class="material-icons">editar</i> </a>
                      @endif
                    @endcan
                    @can('role_destroy')
                    @if ($role->id != 1)
                      <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                        onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">Eliminar</i>
                        </button>
                      </form>
                      @endif
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
              {{-- {{ $users->links() }} --}}
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            {{ $roles->links() }}
          </div>
          <!--End footer-->



@endsection
