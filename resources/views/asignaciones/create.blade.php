@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1>Cursos disponibles</h1>
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
			<form method="post" action="{{ route('estudiantes.asignaciones.store', $estudiante_id) }}">
				@csrf
				@foreach($cursos as $curso)
				<div class="form-check">    
					<input class="form-check-input" type="checkbox" value="{{ $curso->id }}" id="defaultCheck{{$curso->id}}" name="cursos[]">
					<label class="form-check-label" for="defaultCheck{{$curso->id}}">
						{{ $curso->nombre }}
					</label>
					<small class="form-text text-muted">
						{{ $curso->descripcion }}
					</small>
					<small  class="form-text text-muted">
						Semestre: {{ $curso->semestre }} | Ciclo: {{ $curso->ciclo }}
					</small>
				</div>
				<br>
				@endforeach

				@if ($cursos->count() == 0) 
				<div class="form-group">
					<label for="" class="from-label">No hay cursos disponibles</label>
				</div>
				@endif

				<button type="submit" class="btn btn-primary">Asignar</button>
				<a href="{{ route('estudiantes.asignaciones.index', $estudiante_id)}}" class="btn btn-secondary">Cancelar</a>
			</form>
		</div>
	</div>
</div>
@endsection