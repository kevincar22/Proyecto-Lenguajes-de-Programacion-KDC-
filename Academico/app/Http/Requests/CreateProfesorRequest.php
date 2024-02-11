<?php

namespace App\Http\Requests;

use App\Models\Profesor;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProfesorRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

     public function rules()
    {
        return [
            'nombre' => ['required','string','max:255'],
            'cedula' => ['required','string','max:255',  Rule::unique('profesor')->where(function ($query) {
                return $query->where('cedula', $this->cedula);
            })],
            'idasignatura' => ['required','string','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'cedula.required' => 'El campo cedula es requerido',
            'cedula.unique' => 'El profesor ya existe',
            'idasignatura.required' => 'El Materia codigo es requerido',
        ];
    
    }

    public function createProfesor(){
        $Profesor = new Profesor();
        $Profesor->nombre = $this->nombre;
        $Profesor->cedula = $this->cedula;
        $Profesor->idasignatura = $this->idasignatura;
        $Profesor->save();
    
        return redirect()->route('Profesor.index');
    
    }
}