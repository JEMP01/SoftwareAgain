@extends('layouts.app')

@section('content')
<div class="container mt-3">
    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
        
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
    @endif
    <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar un nuevo usuario</a>
    <a href="{{ url('reservas') }}" class="btn btn-primary">Añadir una reserva</a>
    <h1 class="fs-2 fw-bold font-monospace">Lista de empleados</h1>
    <table class="table table-light">
        <thead class="thead-light">
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
                    </td>
                    <td>{{ $empleado->Nombre }}</td>
                    <td>{{ $empleado->Apellidos }}</td>
                    <td>{{ $empleado->Correo }}</td>
                    <td> 
                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                            Editar
                        </a>
                        <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection