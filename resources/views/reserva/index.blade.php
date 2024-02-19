@extends('layouts.base')

@section('contenido')

<div class="row">
    <div class="col-12">
        <div>
            <h2 class="fs-2 fw-bold font-monospace text-dark">Lista de reservas</h2>
        </div>
        <div>
            <a href="{{url('reservas/create')}}" class="btn btn-primary">Crear reserva</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-dark">
                <th>Habitación</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Documento de indentidad</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            @foreach($reservas as $reserva)
                <tr class="text-secondary">
                    <td class="fw-bold">{{$reserva->habitacion}}</td>
                    <td>{{$reserva->nombre}}</td>
                    <td>{{$reserva->apellidos}}</td>
                    <td>{{$reserva->documento}}</td>
                    <td>{{$reserva->descripcion}}</td>
                    <td>{{$reserva->due_date}}</td>
                    <td>
                        <span class="badge bg-warning fs-6">{{$reserva->status}}</span>
                    </td>
                    <td class="d-inline-flex align-items-center">
                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Quieres borrar?')" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>                                                         
                </tr>   

            @endforeach
        </table>
        <a href="{{route('empleado.index')}}">
            <button type="submit" class="btn btn-primary">Volver</button>
        </a>
        {{$reservas->links()}}
    </div>
</div>
@endsection