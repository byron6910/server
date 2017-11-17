<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConductorRequest extends FormRequest
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
            'id_conductor'=>'min:10|required|unique:conductor,correo',
            'nombre'=>'required',
            'apellido'=>'required',
            'telefono'=>'max:10|required',
            'direccion'=>'required',
            'correo'=>'required|email|unique:conductor,id_conductor',
            'id_bus'=>'required'


        ];
    }
}
