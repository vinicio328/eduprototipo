@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editar un curso</h1>

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
        <form method="post" action="{{ route('cursos.update', $curso->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $curso->nombre }}" />
            </div>

            <div class="form-group">
                <label for="codigo">Codigo:</label>
                <input type="text" class="form-control" name="codigo" value="{{ $curso->codigo }}" />
            </div>

            <div class="form-group">
                <label for="ciclo">Ciclo:</label>
                <select class="form-control" name="ciclo" id="ciclo">
                    <option value="1"  @if($curso->ciclo == 1) selected @endif>1 Semestre</option>
                    <option value="2"  @if($curso->ciclo == 2) selected @endif>2 Semestre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <input type="text" class="form-control" name="semestre" value={{ $curso->semestre }} />
            </div>
            <div class="form-group">
                <label for="country">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value={{ $curso->descripcion }}></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection