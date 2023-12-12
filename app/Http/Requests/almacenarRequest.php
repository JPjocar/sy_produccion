<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class almacenarRequest extends FormRequest
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
            'codigo_compra' => 'required|unique:compras|max:255|min:2',
            'fecha_compra' => 'required|date_format:Y-m-d|after_or_equal:01/01/2000|before_or_equal:01/01/2040'
        ];
    }
}
