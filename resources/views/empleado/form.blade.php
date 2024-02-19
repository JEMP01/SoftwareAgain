<h1 class="fs-2 fw-bold font-monospace">{{$modo}} Empleados</h1>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" class="form-control" value="{{ $empleado->Nombre ?? '' }}" name="Nombre" id="Nombre">
</div>
<br>
<div class="form-group">
        <label for="Apellidos">Apellidos</label>
        <input type="text" class="form-control" value="{{ $empleado->Apellidos ?? '' }}" name="Apellidos" id="Apellidos">
</div>
<br>
<div class="form-group">
        <label for="Correo">Correo</label>
        <input type="email" class="form-control" value="{{ $empleado->Correo ?? '' }}" name="Correo" id="Correo">
</div>
<br>
<div class="form-group">
        <label for="Foto">Foto</label>
        @if(isset($empleado->Foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
        @endif
        <input class="form-control" type="file" name="Foto" value="" id="Foto">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{$modo}} Datos">
<a class="btn btn-primary" href="{{ url('empleado/') }}">Regresar</a>
<br>