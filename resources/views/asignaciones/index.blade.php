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
		<h1>Mis cursos</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('estudiantes.asignaciones.create', $estudiante_id)}}" class="btn btn-primary">Asignar más</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>Codigo</td>
					<td>Semestre</td>
					<td>Ciclo</td>
					<td>Descripción</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cursos as $curso)
				<tr>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->codigo}}</td>
					<td>{{$curso->semestre}}</td>
					<td>{{$curso->ciclo}} Semestre</td>
					<td>{{$curso->descripcion}}</td>
					<td>
						<form action="{{ route('estudiantes.asignaciones.destroy', [$estudiante_id, $curso->id])}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Desasignar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection