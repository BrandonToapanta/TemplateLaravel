<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estudiantes = Estudiante::paginate(20);

        return view('pages.tables', compact('estudiantes'));
        // return $estudiantes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pages.add-estudiante');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validacion = $request->validate([
            'cedula' => 'required|max:10',
            'nombres' => 'required',
            'apellidos' => 'required',
            'email' => 'required',
            'edad' => 'numeric|max:3',
        ], [
            'required' => 'Este campo es requerido',
            'numeric' => 'Este campo requiere de numeros',
            'cedula.max' => 'Solo se permite 10 caracteres',
            'edad.max' => 'Solo se permite 3 caracteres',
        ]);

        $estudiante = new Estudiante();

        $estudiante->cedula = $request->input('cedula');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->email = $request->input('email');
        $estudiante->edad = $request->input('edad');

        $estudiante->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $estudiante = Estudiante::find($id);

        return view('pages.edit-estudiante', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $estudiante = Estudiante::find($id);

        $estudiante->cedula = $request->input('cedula');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->email = $request->input('email');
        $estudiante->edad = $request->input('edad');

        $estudiante->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $estudiante = Estudiante::find($id);

        $estudiante->delete();

        return back();
    }
}
