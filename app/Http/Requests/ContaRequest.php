<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
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
            'tipo'              => 'required',
            'titulo'            => 'required',
            'valor'             => 'required',
            'forma_pagamento'   => 'required',
            'mais_informacoes'  => 'required',
            'id_usuario'        => 'required',
            'id_certificacao'   => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // não funcionou
            'tipo.required' => 'A tipo is required',
        ];
    }
}
