<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfesorRequest;
use App\Http\Requests\UpdateProfesorRequest;
use App\Models\Materia;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesor.index', compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all();
        return $this->form('profesor.create', new Profesor, $materias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProfesorRequest $request)
    {
        $request->createProfesor();
        return redirect()->route('profesor.index')->with('success', 'profesor creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profesor $profesor)
    {
        return view('profesor.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        $materias = Materia::all(); 
        return $this->form('profesor.edit', $profesor, $materias); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfesorRequest $request, Profesor $profesor)
    {
        $request->updateProfesor($profesor);
        return redirect()->route('profesor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesor = Profesor::with('aulas')->find($id);

        if (!$profesor) {
            return redirect()->route('profesor.index')->with('error', 'El profesor no existe.');
        }

        if ($profesor->aulas->isNotEmpty()) {
            return redirect()->route('profesor.index')->with('error', 'Este profesor está asignado a un aula y no puede ser eliminado.');
        }

        $profesor->delete();
        return redirect()->route('profesor.index')->with('success', 'Profesor eliminado con éxito.');
    }

    public function form($view, Profesor $profesor, $materias = null)
    {
        return view($view, compact('profesor', 'materias'));
    }
}
