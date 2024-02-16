<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nome" => "required|min:6",
            "contato" => "required|max:9",
            "email" => "required|email|unique:contato",
        ];
    }

    public function messages()
    {
        return [
            "nome.required" => "Favor preencher o nome do contato",
            "nome.min"=>"O nome deve ter no minimo 6 caracteres",
            "contato.required" => "Favor preencher o contato",
            "contato.max"=>"O contato deve ter no maximo 9 digitos",
            "email.required" => "Favor preencher o e-mail do contato",
            "email.email"=>"Favor informar um e-mail válido",
            "email.unique"=>"Email já consta cadastrado"
        ];
    }
}
