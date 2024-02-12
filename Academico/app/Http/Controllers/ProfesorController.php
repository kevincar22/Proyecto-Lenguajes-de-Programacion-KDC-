<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfesorRequest;
use App\Http\Requests\CreateProfesorRequest;
use App\Models\Materia;
use App\Models\Profesor;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Inicio'],
            ['name' => 'Profesores', 'url' => '']
        ];
        $profesores = Profesor::all();
        return view('profesor.index', compact('profesores', 'breadcrumbs'));
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
        return redirect()->route('profesor.index')->with('success', 'Profesor creado con exito');
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
    public function update(UpdateProfesorRequest $request, Profesor $Profesor)
    {
        $request->updateProfesor($Profesor);
        return redirect()->route('profesor.index')->with('success', 'Profesor editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesor = Profesor::with('aulas')->find($id); // Cambia 'aula' por 'aulas' para reflejar la relación uno a muchos

        if (!$profesor) {
            return redirect()->route('profesor.index')->with('error', 'El profesor no existe.');
        }

        // Verifica si el profesor tiene aulas asignadas
        if ($profesor->aulas->isNotEmpty()) {
            // Si el profesor tiene una o más aulas asignadas, impide la eliminación
            return redirect()->route('profesor.index')->with('error', 'Este profesor está asignado a una o más aulas y no puede ser eliminado.');
        }

        // Si el profesor no tiene aulas asignadas, procede a eliminarlo
        $profesor->delete();
        return redirect()->route('profesor.index')->with('success', 'Profesor eliminado con éxito.');
    }


    public function form($view, Profesor $profesor, $materias = null)
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Inicio'],
            ['url' => route('profesor.index'), 'name' => 'Profesores'],
        ];
    
        if ($profesor && $profesor->exists) {
            $breadcrumbs[] = ['name' => 'Editar Materia'];
        } else {
            $breadcrumbs[] = ['name' => 'Crear Materia'];
        }
        return view($view, compact('profesor', 'materias', 'breadcrumbs'));
    }
}
