<?php

namespace App\Http\Requests;

use App\Models\Materia;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriaRequest extends FormRequest{
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
            'descripcion' => ['required','string','max:255'],
            'codigo' => ['required','string','max:255', Rule::unique('materia')->ignore($this->materia)],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'descripcion.required' => 'El campo descripcion es requerido',
            'codigo.required' => 'El campo codigo es requerido',
        ];
    
    }

    public function updateMateria(Materia $materia){
        $materia->nombre = $this->nombre;
        $materia->descripcion = $this->descripcion;
        $materia->codigo = $this->codigo;
        $materia->save();
    
        return redirect()->route('materia.index');
    
    }
}