<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CooperativaFormRequest extends FormRequest
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
            'id_cooperativa'=>'max:10|required|unique:cooperativa,correo',
            'nombre'=>'required',
            'direccion'=>'required',
            'telefono'=>'max:10|required',
            
            'estado'=>'required|boolean',
         
            'correo'=>'required|unique:cooperativa,id_cooperativa'
            
        ];
    }
}
