<?php

namespace App\Http\Controllers;

use App\Http\Request\CreateMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use App\Models\Materia;

class MateriaController extends Controller{
    public function index(){
        $materias = Materia::all();
        return view('materia.index', compact('materias'));
    }

    public function show(Materia $materia){
        return view('materia.show', compact('materia'));
    }

    public function store(CreateMateriaRequest $request){
        $request->createMateria();
        return redirect()->route('materia.index');
    }

    public function create(){
        return $this->form('materia.create', new Materia);
    }

    public function edit(Materia $materia){
        return $this->form('materia.edit', $materia);
    }

    public function update(Materia $materia, UpdateMateriaRequest $request){
        $request->updateMateria($materia);
        return redirect()->route('materia.index');
    }

    public function trash(Materia $materia){
        $materia->delete();
        return redirect()->route('materia.index');
    }


    public function form($view, Materia $materia){
        return view($view, compact('materia'));
    }
}