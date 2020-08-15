<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;

class EstudianteController extends Controller
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
        $estudiantes = Estudiante::all();

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'Introduzca un email valido en el campo :attribute.'
        ];

        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'carnet'=>'required',
            'email'=>'required|email'
        ]);

        $estudiante = new Estudiante([
            'nombres' => $request->get('nombres'),
            'apellidos' => $request->get('apellidos'),
            'email' => $request->get('email'),
            'carnet' => $request->get('carnet')
        ]);
        $estudiante->save();
        return redirect('/estudiantes')->with('success', '¡Estudiante guardado!');
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
        $estudiante = Estudiante::find($id);
        return view('estudiantes.edit', compact('estudiante'));  
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

        $customMessages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'Introduzca un email valido en el campo :attribute.'
        ];

        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'carnet'=>'required',
            'email'=>'required|email'
        ]);

        $estudiante = Estudiante::find($id);
        $estudiante->nombres =  $request->get('nombres');
        $estudiante->apellidos = $request->get('apellidos');
        $estudiante->email = $request->get('email');
        $estudiante->carnet = $request->get('carnet');
        $estudiante->save();

        return redirect('/estudiantes')->with('success', '¡Estudiante actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();

        return redirect('/estudiantes')->with('success', '¡Estudiante eliminado!');
    }
}
