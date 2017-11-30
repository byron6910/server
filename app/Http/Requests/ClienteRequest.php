<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     private $route;
        // public function __construct(Route $route){
        //         $this->route=$route;
        // }
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
            'ci'=>'digits:10|required|unique:clientes,correo',            
           
            'nombre'=>'required',
            'apellido'=>'required',
            'telefono'=>'max:10|required',
            'ciudad'=>'required',
            'calle'=>'required',
            'postal'=>'required',
           // 'foto'=>'required',
            'foto'=>'mimes:jpeg,bmp,png',//formato archivos
            'usuario'=>'required',
            'correo'=>'required|unique:clientes,ci',
            
            //'correo'=>'required|unique:clientes,correo,'.$this->id.',ci',
          // 'correo'=>Rule::unique('clientes')->ignore($this->id,'ci'), 
           'password'=>'required'


        ];
    }
}
