<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusRequest extends FormRequest
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
            
            'id_bus'=>'max:6|required',
            'nombre'=>'required',
            'capacidad'=>'required',
            'condicion'=>'required',
            'id_cooperativa'=>'required'
        ];
    }
}