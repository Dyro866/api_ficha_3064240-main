<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nit' => [
                'sometimes',
                'required',
                'string',
                'max:20',
                Rule::unique('proveedores', 'nit')->ignore($this->route('proveedor')),
            ],
            'razon_social' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
            'contacto' => [
                'sometimes',
                'required',
                'string',
                'max:100',
            ],
            'telefono' => [
                'sometimes',
                'required',
                'string',
                'max:20',
            ],
            'email' => [
                'sometimes',
                'required',
                'email',
                'max:255',
            ],
            'direccion' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
            'estado' => [
                'sometimes',
                'required',
                'boolean',
            ],
        ];
    }
}
