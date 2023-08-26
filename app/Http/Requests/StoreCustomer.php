<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomer extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'identificador' => 'required',
            'telefono' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
