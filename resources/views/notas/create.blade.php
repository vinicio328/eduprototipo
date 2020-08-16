@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1>Ingreso de notas</h1>
		<h3>Estudiante: {{$estudiante->nombres}} {{$estudiante->apellidos}} | Curso: {{ $curso->nombre }}</h2>
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
			<form method="post" action="{{ route('estudiantes.cursos.notas.store', [$estudiante->id, $curso->id]) }}">
				@csrf
				
				<div class="form-group">
					<table class="table table-striped">
						<thead>
						<tr>
							<td>Actividad</td>
							<td>Valor Asignado</td>
							<td>Puntaje</td>
						</tr>
						</thead>
						<tbody>
							@foreach($curso->actividades as $actividad)
							<tr>
								<td>
									{{$actividad->nombre}}
								</td>
								<td>
									{{$actividad->valor}}
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>				
				</div>				

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</div>
@endsection