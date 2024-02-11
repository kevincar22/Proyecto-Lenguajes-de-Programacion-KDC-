<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class MateriassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = DB::table('Materias')->get();
        return view('materias.index', ['materias' => $asignaturas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('asignatura.create')
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);
        Asignatura::create($request->all());
        return redirect()->route('materias.index')->with('success', 'materias creado con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignaturas $asignaturas)
    {
        //
    }
}
