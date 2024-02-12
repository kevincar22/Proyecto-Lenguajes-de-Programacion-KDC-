<?php

namespace App\Http\Requests;

use App\Models\Profesor;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfesorRequest extends FormRequest
{
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
        $profesorId = $this->route('Profesor');
        return [
            'nombre' => ['required', 'string', 'max:255'],
            'cedula' => [
                'required',
                'string',
                'max:255',
                Rule::unique('profesor')->ignore($profesorId, 'idprofesor')
            ],
            'idasignatura' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'cedula.required' => 'El campo cedula es requerido',
            'cedula.unique' => 'La cedula ya existe',
            'idasignatura.required' => 'El campo asignatura es requerido'
        ];
    }

    /*public function updateProfesor(Profesor $profesor)
    {
        $profesor->update($this->validated()); 
        return redirect()->route('Profesor.index');
    }*/

    public function updateProfesor(Profesor $profesor)
    {
        $profesor->nombre = $this->nombre;
        $profesor->cedula = $this->cedula;
        $profesor->idasignatura = $this->idasignatura;
        $profesor->save();

        return redirect()->route('profesor.index');
    }
}
