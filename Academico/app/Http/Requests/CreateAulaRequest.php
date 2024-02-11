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
            'idprofesor' => ['required'],
        ];
    
    }

    public function messages()
    {
        return [
            'descripcion.required' => 'El campo descripcion es requerido',
            'codigo.required' => 'El campo codigo es requerido',
            'codigo.unique' => 'El codigo ya existe',
        ];
    }

    public function createAula(){
        $Aula = new Aula();
        $Aula->codigo = $this->codigo;
        $Aula->idasignatura = $this->idasignatura;
        $Aula->idprofesor = $this->idprofesor;

        $Aula->save();
    }

}