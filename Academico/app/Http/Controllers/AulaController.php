<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aulas = DB::table('aulas')->get();
        return view('aulas.index', ['aulas' => $asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
        ]);
        Asignatura::create($request->all());
        return redirect()->route('aula.index')->with('success', 'aula creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aula $aula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aula $aula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
