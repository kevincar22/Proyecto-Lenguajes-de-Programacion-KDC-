<?php

namespace App\Http\Requests;

use App\Models\Aula;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAulaRequest extends FormRequest
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
        $aulaId = $this->route('Aula');
        return [
            'codigo' => [
                'required',
                'string',
                'max:255',
                Rule::unique('aula')->ignore($aulaId, 'idaula')
            ],
            'idasignatura' => ['required', 'integer'],
            'idprofesor' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El campo nombre es requerido',
            'codigo.unique' => 'El codigo ya existe',
            'idasignatura.required' => 'El campo idasignatura es requerido',
            'idprofesor.required' => 'El campo idasignatura es requerido'
        ];
    }

    public function updateAula(Aula $aula)
    {
        $aula->codigo = $this->codigo;
        $aula->idasignatura = $this->idasignatura;
        $aula->idprofesor = $this->idprofesor;
        $aula->save();
        return redirect()->route('Aulas.index');
    }
}
