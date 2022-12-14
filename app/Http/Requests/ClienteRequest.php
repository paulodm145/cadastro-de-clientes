<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'birth_date' => 'required',
            'telephone' => 'required|max:15',
            'address' => 'required|max:255',
            'district' => 'required|max:255',
            'number' => 'required|max:50',
            'complement' => 'max:100',
            'city' => 'required|max:10',
            'state' => 'required|size:2',
            'postal_code' => 'required|size:8'
        ];

        if ($this->method() === "POST") {
            $rules = [
                'cpfcnpj' => 'sometimes|required|max:15|unique:clientes',
                'email' => 'sometimes|required|max:255|unique:clientes'
            ];
        }

        if ($this->method() === "PUT") {
            $rules = [
                'cpfcnpj' => ['required',
                    Rule::unique('clientes')->ignore($this->id)
                    ],
                'email' => ['required',
                    Rule::unique('clientes')->ignore($this->id)
                ]
            ];
        }

        return $rules;
    }

    public function store()
    {
        return [
            'cpfcnpj' => 'sometimes|required|max:15|unique:clientes',
            'email' => 'sometimes|required|max:255|unique:clientes'
        ];
    }

    public function update()
    {
        return [
            'cpfcnpj' => 'sometimes|required|max:15|unique:clientes,'.$this->cpfcnpj,
            'email' => 'sometimes|required|max:255|unique:clientes,'.$this->id
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
            'name.required' => 'O Campo NOME ?? OBRIGAT??RIO',
            'name.max' => 'O Campo NOME deve ter no m??ximo 255 caracteres',
            'cpfcnpj.required' => 'CPF/CNPJ ?? OBRIGAT??RIO',
            'cpfcnpj.unique' => 'CPF/CNPJ deve ser unico',
            'cpfcnpj.max' => 'O Campo CPF/CNPJ deve possuir 11 caracteres',
            'birth_date.required' => 'O Campo DATA DE NASCIMENTO ?? OBRIGAT??RIO',
            'telephone.required' => 'O Campo TELEFONE ?? OBRIGAT??RIO',
            'telephone.max' => 'O Campo TELEFONE deve ter no m??ximo 15 caracteres',
            'address.required' => 'O Campo ENDERE??O ?? OBRIGAT??RIO',
            'address.max' => 'O Campo ENDERE??O deve ter no m??ximo 255 caracteres',
            'district.required' => 'O Campo BAIRRO ?? OBRIGAT??RIO',
            'district.MAX' => 'O Campo BAIRRO deve ter no m??ximo 255 caracteres',
            'number.required' => 'O Campo N??MERO ?? OBRIGAT??RIO',
            'number.MAX' => 'O Campo N??MERO deve ter no m??ximo 50 caracteres',
            'complement.MAX' => 'O Campo COMPLEMENTO deve ter no m??ximo 100 caracteres',
            'city.required' => 'O Campo CIDADE ?? OBRIGAT??RIO',
            'city.size' => 'O Campo cidade deve ter no m??ximo 10 caracteres',
            'state.required' => 'O Campo UF ?? OBRIGAT??RIO',
            'state.size' => 'O Campo UF deve ter no m??ximo 2 caracteres',
            'postal_code.required' => 'O Campo CEP ?? OBRIGAT??RIO',
            'postal_code.size' => 'O Campo CEP deve ter no m??ximo 8 caracteres',
            'email.required' => 'O Campo E-MAIL ?? obrigat??rio',
            'email.max' => 'O Campo EMAIL deve ter no m??ximo 255 caracteres',
            'email.unique' => 'O Campo EMAIL deve ser ??nico'
        ];
    }
}
