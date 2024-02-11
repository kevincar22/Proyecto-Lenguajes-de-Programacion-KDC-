<?php

namespace App\Http\Requests;

use App\Models\Aula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateAulaRequest extends FormRequest{
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
            'codigo' => ['required','string','max:60'],
            'idasignatura' => ['required'],
            'idprofesor' => ['required','string','max:255', Rule::unique('Aula')->where(function ($query) {
                return $query->where('idprofesor', $this->idprofesor);
            })],
        ];
    
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'codigo.required' => 'El campo codigo es requerido',
            'codigo.unique' => 'El codigo ya existe',
        ];
    }

    public function createAula(){
        $Aula = new Aula();
        $Aula->nombre = $this->nombre;
        $Aula->descripcion = $this->descripcion;
        $Aula->codigo = $this->codigo;
        $Aula->save();
    }

}