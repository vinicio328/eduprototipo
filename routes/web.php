<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale('es');

Auth::routes();

Route::get('home', function () {
    return redirect('/');
});

Route::get('/', 'HomeController@index')->name('home');

Route::resource('estudiantes', 'EstudianteController');

Route::resource('estudiantes.asignaciones', 'AsignacionController');

Route::resource('cursos', 'CursoController');

Route::resource('cursos.actividades', 'ActividadController');