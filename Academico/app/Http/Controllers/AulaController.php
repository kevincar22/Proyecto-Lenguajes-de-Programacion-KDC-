<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Materia;
use App\Models\Profesor;
use App\Http\Requests\CreateAulaRequest;
use App\Http\Requests\UpdateAulaRequest;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Inicio'],
            ['name' => 'Aulas', 'url' => '']
        ];
        $aulas = Aula::all();
        return view('aula.index', compact('aulas', 'breadcrumbs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        return view('aula.show', compact('aula'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAulaRequest $request) 
    {

        // $request->validate([
        //     'codigo' => 'required',
        // ]);
        //Aula::create($request->all());
        $request->createAula();
        return redirect()->route('Aulas.index')->with('success', 'Aula creada con exito');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materias = Materia::all(); // Obtiene todas las materias
        $profesores = Profesor::all(); // Obtiene todos los profesores
        return $this->form('aula.create', new Aula, $materias, $profesores);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aula::find($id);
        $materia = Materia::all();
        $profesor = Profesor::all();
        return $this->form('aula.edit', $aula, $materia, $profesor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAulaRequest $request, Aula $Aula)
    {
        $request->updateAula($Aula);
        return redirect()->route('Aulas.index')->with('success', 'Aula editada con exito');
    }

    public function trash(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('Aulas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aula = Aula::find($id);

        if (!$aula) {
            return redirect()->route('Aulas.index')->with('error', 'La aula no existe.');
        }

        // if ($aula->profesores->isNotEmpty() and $aula->materias->isNotEmpty()) {
        //     // Si la materia está asignada a algún profesor, redirige con un mensaje de error
        //     return redirect()->route('Aulas.index')->with('error', 'Esta aula está asignada a un profesor/materia y no puede ser eliminada.');
        // }

        // Si no está asignada a ningún profesor, procede a eliminar
        $aula->delete();
        return redirect()->route('Aulas.index')->with('success', 'Aula eliminada con éxito.');
    }

    public function form($view, Aula $aula, $materias = null, $profesores = null)
    {
        $breadcrumbs = [
            ['url' => route('home'), 'name' => 'Inicio'],
            ['url' => route('Aulas.index'), 'name' => 'Aulas'],
        ];
    
        if ($aula && $aula->exists) {
            $breadcrumbs[] = ['name' => 'Editar Materia'];
        } else {
            $breadcrumbs[] = ['name' => 'Crear Materia'];
        }
        return view($view, compact('aula', 'materias', 'profesores', 'breadcrumbs'));
    }
}
