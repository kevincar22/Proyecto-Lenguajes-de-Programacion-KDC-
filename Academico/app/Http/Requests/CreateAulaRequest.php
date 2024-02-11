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
            'codigo' => ['required','string','max:255', Rule::unique('aula')->where(function ($query) {
                return $query->where('codigo', $this->codigo);
            })],
            'idasignatura' => ['required'],
            'idprofesor' => ['required'],
        ];
    
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El campo codigo es requerido',
            'codigo.unique' => 'El codigo ya existe',
            'idprofesor.required' => 'El campo de profesor está vacio',
            'idasignatura.required' => 'El campo de materia está vacio'
        ];
    }

    public function createAula(){
        $aula = new Aula();
        $aula->codigo = $this->codigo;
        $aula->idasignatura = $this->idasignatura;
        $aula->idprofesor = $this->idprofesor;

        $aula->save();
    }

}
