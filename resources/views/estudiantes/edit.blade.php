@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar un estudiante</h1>

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
        <form method="post" action="{{ route('estudiantes.update', $estudiante->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" name="nombres" value="{{ $estudiante->nombres }}" />
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                {{ $estudiante->apellidos }}
                <input type="text" class="form-control" name="apellidos" value="{{ $estudiante->apellidos }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{ $estudiante->email }}" />
            </div>
            <div class="form-group">
                <label for="carnet">Carnet:</label>
                <input type="text" class="form-control" name="carnet" value="{{ $estudiante->carnet }}" />
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection