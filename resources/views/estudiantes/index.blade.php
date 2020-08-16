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
		<h1>Estudiantes</h1>    
		<div>
			<a style="margin: 19px;" href="{{ route('estudiantes.create')}}" class="btn btn-primary">Nuevo estudiante</a>
		</div>  
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Email</td>
					<td>Carnet</td>
					<td colspan = 2>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($estudiantes as $estudiante)
				<tr>
					<td>{{$estudiante->id}}</td>
					<td>{{$estudiante->nombres}} {{$estudiante->apellidos}}</td>
					<td>{{$estudiante->email}}</td>
					<td>{{$estudiante->carnet}}</td>
					<td>
						<a href="{{ route('estudiantes.edit',$estudiante->id)}}" class="btn btn-primary">Editar</a>
					</td>
					<td>
						<form action="{{ route('estudiantes.destroy', $estudiante->id)}}" method="post">
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