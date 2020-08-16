@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1>Agregar  Actividad</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cursos.actividades.store', $curso_id) }}">
          @csrf
          <div class="form-group">    
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>

          <div class="form-group">
              <label for="descripcion">Descripcion:</label>
              <input type="text" class="form-control" name="descripcion"/>
          </div>

          <div class="form-group">
              <label for="valor">Valor:</label>
              <input type="number" class="form-control" name="valor"/>
          </div>                           
          <button type="submit" class="btn btn-primary">Agregar Actividad</button>
      </form>
  </div>
</div>
</div>
@endsection