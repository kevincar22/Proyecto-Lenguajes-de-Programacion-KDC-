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
        $aulas = Aula::all();
        return view('aula.index', compact('aulas'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->form('aula.create', new Aula);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'codigo' => 'required',
        ]);
        Aula::create($request->all());
        return redirect()->route('aula.index')->with('success', 'aula creada con exito');

    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        return view('aula.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aula::find($id);
        return $this->form('aula.edit', $aula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aula $aula)
    {
        $request->updateAula($Aula);
        return redirect()->route('Aula.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
