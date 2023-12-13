<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class almacenarClienteRequest extends FormRequest
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
            'nro_identidad' => 'required|integer|max:99999999999',
            'nombre' => 'required|min:2',
            'telefono' => 'required|integer|max:99999999999'
        ];
    }
}
