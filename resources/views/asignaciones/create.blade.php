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

				<button type="submit" class="btn btn-primary">Asignar</button>
			</form>
		</div>
	</div>
</div>
@endsection