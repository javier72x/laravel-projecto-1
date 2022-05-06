@extends('theme.base')

@section('content')
  
  <div class="container py-5 text-center">
      <h1>Listado de clientes</h1>
      <a href="{{route('client.create')}}" class="btn btn-primary">Crear Clientes</a>
      
      @if (Session::has('mensaje'))
          <div class="alert alert-info my-5">
              {{Session::get('mensaje')}}
          </div>
      @endif

      <table class="table">
          <thead>
              <th>Nombre</th>
              <th>Saldo</th>
              <th>Acciones</th>
          </thead>
          <tbody>
              @forelse ($clients as $row)
              <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->due}}</td>
                <td>
                    <a href="{{ route('client.edit', $row) }}" class="btn btn-warning">Editar</a>

                    <form action="{{ route('client.destroy', $row) }}" method="post" class="d-inline">
                    @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro de Eliminar este Cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr> 
              @empty
              <tr>
                <td colspan="3">No hay registros</td>
            </tr> 
              @endforelse
              
          </tbody>
      </table>
       
      @if ($clients->count())
      {{$clients->links()}}
      @endif
      

  </div>
    
@endsection