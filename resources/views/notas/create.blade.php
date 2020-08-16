@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-8 offset-sm-2">
		<h1>Ingreso de notas</h1>
		<h3>Curso: Curso 1</h2>
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
			<form method="post">
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
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
							<tr>
								<td>
									Actividad 1
								</td>
								<td>
									10
								</td>
								<td>
									<input type="number" class="form-control">
								</td>
							</tr>
						</tbody>
					</table>

				
				</div>
				<hr>
				

				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
		</div>
	</div>
</div>
@endsection