<?php

namespace App\Http\Requests;

use App\Models\Aula;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAulaRequest extends FormRequest{
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
            'codigo' => ['required','string','max:60', Rule::unique('aula')->ignore($this->aula)],
            'idasignatura' => ['required'],
            'idprofesor' => ['nullable'],
            
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El campo nombre es requerido',
            'idasignatura.required' => 'El campo idasignatura es requerido',
            'idprofesor.required' => 'El campo idasignatura es requerido'
        ];
    }

    public function updateAula(Aula $Aula){
        
        $Aula->codigo = $this->codigo;
        $Aula->idasignatura = $this->idasignatura;
        $Aula->idprofesor = $this->idprofesor;
        $Aula->save();
    
        return redirect()->route('Aulas.index');
    
    }
}