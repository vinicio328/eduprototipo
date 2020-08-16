@extends('layouts.app')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Sistema de control de notas</h1>
	<p class="lead">Administre estudiantes, cursos y actividades, asigne cursos a estudiantes, publique notas, etc.</p>
</div>
<div class="container">
	<div class="card-deck mb-3 text-center">
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Estudiantes</h4>
			</div>
			<div class="card-body">				
				<a class="btn btn-lg btn-block btn-primary" href="{{ route('estudiantes.index') }}">Estudiantes</a>
			</div>
		</div>
		<div class="card mb-4 box-shadow">
			<div class="card-header">
				<h4 class="my-0 font-weight-normal">Cursos</h4>
			</div>
			<div class="card-body">
				<a class="btn btn-lg btn-block btn-primary" href="{{ route('cursos.index') }}">Cursos</a>
			</div>
		</div>
	</div>
</div>

@endsection
