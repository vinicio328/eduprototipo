@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1>Editar una actividad</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('cursos.actividades.update', [$actividad->curso_id, $actividad->id]) }}">
            @method('PATCH') 
            @csrf            

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $actividad->nombre }}" />
            </div>

            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" class="form-control" name="valor" value="{{ $actividad->valor }}" />
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $actividad->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('cursos.actividades.index', $actividad->curso_id)}}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection