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
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'tipo'              => 'required|numeric',
            'titulo'            => 'required',
            'valor'             => 'required',
            'forma_pagamento'   => 'required',
            'mais_informacoes'  => 'required',
            'id_usuario'        => 'required|numeric',
            'id_certificacao'   => 'required|numeric'
        ];

    }

}
