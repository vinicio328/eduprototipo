<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Actividad;

class ActividadController extends Controller
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
     * @param  int  $curso_id
     * @return \Illuminate\Http\Response
     */
    public function index($curso_id)
    {
        $curso = Curso::find($curso_id);
         
        return view('actividades.index', compact('curso', 'curso_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($curso_id)
    {
        return view('actividades.create', compact('curso_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($curso_id, Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
            'valor'=>'required'
        ]);

        $actividad = new Actividad([
            'nombre' => $request->get('nombre'),
            'descripcion' => $request->get('descripcion'),
            'valor' => $request->get('valor'),
            'curso_id' => $curso_id,
            
        ]);
        $actividad->save();

        return redirect()->route('cursos.actividades.index', $curso_id)->with('success', '¡Actividad Guardada!');        

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
    public function destroy($curso_id, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();

        return redirect()->route('cursos.actividades.index', $curso_id)->with('success', 'Actividad eliminada!');
    }
}
