@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1>Agregar un estudiante</h1>
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
      <form method="post" action="{{ route('estudiantes.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nombres">Nombres:</label>
              <input type="text" class="form-control" name="nombres"/>
          </div>

          <div class="form-group">
              <label for="last_name">Apellidos:</label>
              <input type="text" class="form-control" name="apellidos"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="city">Carnet:</label>
              <input type="text" class="form-control" name="carnet"/>
          </div>          
          <button type="submit" class="btn btn-primary">Agregar estudiante</button>
          <a href="{{ route('estudiantes.index')}}" class="btn btn-secondary">Cancelar</a>
      </form>
  </div>
</div>
</div>
@endsection