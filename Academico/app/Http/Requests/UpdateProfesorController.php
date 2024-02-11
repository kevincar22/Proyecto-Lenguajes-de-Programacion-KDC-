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
        return [
            'nombre' => ['required', 'string', 'max:60'],
            'cedula' => ['required', Rule::unique('Profesor')->ignore($this->Profesor)],
            'idasignatura' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'cedula.required' => 'El campo cedula es requerido',
            'idasignatura.required' => 'El campo asignatura es requerido'
        ];
    }

    /*public function updateProfesor(Profesor $profesor)
    {
        $profesor->update($this->validated());
        return redirect()->route('Profesor.index');
    }*/

    public function updateProfesor(Profesor $Profesor){
        $Profesor->nombre = $this->nombre;
        $Profesor->cedula = $this->cedula;
        $Profesor->idasignatura = $this->idasignatura;
        $Profesor->save();
    
        return redirect()->route('Profesor.index');
    
    }
}
