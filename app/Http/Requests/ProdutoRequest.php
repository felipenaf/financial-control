<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
    public function storeRules()
    {
        return [
            'id_grupo' => 'required|integer',
            'id_usuario' => 'required|integer',
            'descricao' => 'required',
            'valor' => 'required|numeric',
        ];

    }

    public function updateRules()
    {
        return [
            'id_grupo' => 'integer',
            'valor' => 'numeric',
            'data_criacao' => 'date',
            'descricao' => 'filled'
        ];

    }

}
