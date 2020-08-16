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
		<h1>Cursos</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('cursos.create')}}" class="btn btn-primary">Nuevo curso</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Codigo</td>
					<td>Semestre</td>
					<td>Ciclo</td>
					<td>Descripción</td>
					<td colspan="3" style="width:30%">Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cursos as $curso)
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
						<a href="{{ route('cursos.actividades.index',$curso->id)}}" class="btn btn-secondary">Actividades</a>
					</td>
					<td width="25px">
						<form action="{{ route('cursos.destroy', $curso->id)}}" method="post">
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