<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrigenDestinoRequest extends FormRequest
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
            'id_origen_destino'=>'max:10|required|unique:origen_destino,origen',
            'origen'=>'required',
            'destino'=>'required',
            'cantidad'=>'max:50|required|integer',
            
            'precio'=>'required|numeric'
         
            


        ];
    }
}
