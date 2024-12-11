<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
            "email"=>"required|string|exists:users,email",
            "password"=>"required:string"
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function message(): array
    {
        return [
            "email.required"=>"campo email requerido",
            "email.string"=>"formato de compo ingresado no valido",
            "email.exists"=>"email ingresado no se encuentra registrado",
            "password.required"=>"campo password requerido",
            "password.string"=>"formato de compo ingresado no valido"
        ];
    }
}
