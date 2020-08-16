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
		<h1>Actividades del curso</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('cursos.actividades.create', $curso_id)}}" class="btn btn-primary">Nueva actividad</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<!-- <tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Codigo</td>
					<td>Semestre</td>
					<td>Ciclo</td>
					<td>Descripción</td>
					<td colspan = 2>Acciones</td>
				</tr> -->
			</thead>
			<tbody>
				<!-- @foreach($actividades as $curso)
				<tr>
					<td>{{$curso->id}}</td>
					<td>{{$curso->nombre}}</td>
					<td>{{$curso->codigo}}</td>
					<td>{{$curso->semestre}}</td>
					<td>{{$curso->ciclo}} Semestre</td>
					<td>{{$curso->descripcion}}</td>
					<td>
						<a href="{{ route('cursos.edit',$curso->id)}}" class="btn btn-primary">Editar</a>
					</td>
					<td>
						<form action="{{ route('cursos.destroy', $curso->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Borrar</button>
						</form>
					</td>
				</tr>
				@endforeach -->
			</tbody>
		</table>
	</div>
</div>
@endsection