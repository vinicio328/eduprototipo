<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CursoController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'codigo'=>'required',
            'ciclo' => 'required',
            'semestre' => 'required'
            
        ]);

        $curso = new Curso([
            'nombre' => $request->get('nombre'),
            'codigo' => $request->get('codigo'),
            'ciclo' => $request->get('ciclo'),
            'semestre' => $request->get('semestre'),
            'descripcion' => $request->get('descripcion')
        ]);
        $curso->save();
        return redirect('/cursos')->with('success', '¡Curso guardado!');
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
        $curso = Curso::find($id);
        return view('cursos.edit', compact('curso')); 
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
        $request->validate([
            'nombre'=>'required',
            'codigo'=>'required',
            'ciclo' => 'required',
            'semestre' => 'required'
            
        ]);     

        $curso = Curso::find($id);
        $curso->nombre =  $request->get('nombre');
        $curso->codigo = $request->get('codigo');
        $curso->ciclo = $request->get('ciclo');
        $curso->semestre = $request->get('semestre');
        $curso->descripcion = $request->get('descripcion');
        $curso->save();

        return redirect('/cursos')->with('success', '¡Curso actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect('/cursos')->with('success', '¡Curso eliminado!');
    }
}
