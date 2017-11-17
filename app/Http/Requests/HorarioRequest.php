<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioRequest extends FormRequest
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
            'id_horario'=>'max:10|required|unique:horarios,hora',
            'fecha_horario'=>'required|date',
            'hora'=>'required',//revisar tiempo
            'id_origen_destino'=>'required|numeric'
         



        ];
    }
}
