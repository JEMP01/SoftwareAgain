@extends('layouts.base')

@section('contenido')
<div class="row text-secondary">
    <div class="col-12">
        <div>
            <h2 class="fs-2 fw-bold font-monospace text-dark">Editar reserva</h2>
        </div>
        <div>
            <a href="{{route('reservas.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>Upss,</strong> algo salió mal..<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('reservas.update', $reserva)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Habitación:</strong>
                    <input type="text" name="habitacion" class="form-control" placeholder="Número de habitación" value={{$reserva->habitacion}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input class="form-control" name="nombre" placeholder="Nombre del cliente" value={{$reserva->nombre}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input class="form-control" name="apellidos" placeholder="Apellidos del cliente" value={{$reserva->apellidos}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Documento de indentidad:</strong>
                    <input type="text" class="form-control" name="documento" placeholder="Documento de identidad del cliente" value={{$reserva->documento}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción...">{{$reserva->descripcion}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha límite:</strong>
                    <input type="date" name="due_date" class="form-control" value={{$reserva->due_date}} id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Estado (inicial):</strong>
                    <select name="status" class="form-select" id="">
                        <option value="">-- Elige el status --</option>
                        <option value="Reservada" @selected("Reservada" == $reserva->status)>Reservada</option>
                        <option value="Ocupada" @selected("Ocupada" == $reserva->status)>Ocupada</option>
                        <option value="En salida" @selected("En salida" == $reserva->status)>En salida</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection