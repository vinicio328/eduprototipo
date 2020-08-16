<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Estudiante;

class AsignacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  int  $estudiante_id
     * @return \Illuminate\Http\Response
     */
    public function index($estudiante_id)
    {
        $cursos = Estudiante::find($estudiante_id)->cursos;
         
        return view('asignaciones.index', compact('cursos', 'estudiante_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($estudiante_id)
    {
        $cursosAsignados = Estudiante::find($estudiante_id)->cursos;
        $todosLosCursos = Curso::all();
        $cursos = $todosLosCursos->diff($cursosAsignados);

        return view('asignaciones.create', compact('cursos', 'estudiante_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($estudiante_id, Request $request)
    {
        $estudiante = Estudiante::find($estudiante_id);        
        $estudiante->cursos()->attach($request->get('cursos'));

        return redirect()->route('estudiantes.asignaciones.index', $estudiante_id)->with('success', '¡Asignación actualizada!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($estudiante_id, $id)
    {
        $estudiante = Estudiante::find($estudiante_id);
        $estudiante->cursos()->detach($id);

        return redirect()->route('estudiantes.asignaciones.index', $estudiante_id)->with('success', '¡Asignación eliminada!');
        
    }
}
