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
        return view('Aulas.index', compact('aulas'));        
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
        return redirect()->route('Aulas.index')->with('success', 'aula creada con exito');

    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->form('Aulas.create', new Aula);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aula $aula)
    {
        return view('Aulas.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aula = Aula::find($id);
        return $this->form('Aulas.edit', $aula);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aula $aula)
    {
        $request->updateAula($Aula);
        return redirect()->route('Aulas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aula $aula)
    {
        //
    }
}
