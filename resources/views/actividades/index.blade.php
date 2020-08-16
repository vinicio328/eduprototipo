@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">

		@if(session()->get('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}  
		</div>
		@endif
	</div>
	<div class="col-sm-12">
		<h1>{{ $curso->nombre }} - Actividades</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('cursos.actividades.create', $curso_id)}}" class="btn btn-primary">Nueva actividad</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Descripcion</td>
					<td>Valor</td>
					<td colspan = 2 style="width: 20%">Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($curso->actividades as $actividad)
				<tr>
					<td>{{$actividad->nombre}}</td>
					<td>{{$actividad->descripcion}}</td>
					<td>{{$actividad->valor}}</td>
					<td>
						<a href="{{ route('cursos.actividades.edit', [$curso->id, $actividad->id])}}" class="btn btn-primary">Editar</a>
					</td>
					<td>
						<form action="{{ route('cursos.actividades.destroy', [$curso->id, $actividad->id])}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Borrar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection