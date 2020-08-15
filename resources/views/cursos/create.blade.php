@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1 class="display-3">Agregar un curso</h1>
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
			<form method="post" action="{{ route('cursos.store') }}">
				@csrf
				<div class="form-group">    
					<label for="nombre">Nombre:</label>
					<input type="text" class="form-control" name="nombre"/>
				</div>

				<div class="form-group">
					<label for="codigo">Código:</label>
					<input type="text" class="form-control" name="codigo"/>
				</div>

				<div class="form-group">
					<label for="ciclo">Ciclo:</label>
					<select class="form-control" name="ciclo" id="ciclo">
						<option value="1">1 Semestre</option>
						<option value="2">2 Semestre</option>
					</select>
				</div>
				<div class="form-group">
					<label for="semestre">Semestre:</label>
					<input type="number" class="form-control" name="semestre"/>
				</div>
				<div class="form-group">
					<label for="descripcion">Descripción:</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
				</div>                         
				<button type="submit" class="btn btn-primary">Agregar curso</button>
			</form>
		</div>
	</div>
</div>
@endsection