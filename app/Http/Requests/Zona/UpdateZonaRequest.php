<?php

namespace App\Http\Requests\Zona;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateZonaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Nombre obligatorio, texto, máximo 80 caracteres
            // y único ignorando el registro actual
            'nombre' => [
                'sometimes',
                'string',
                'max:80',
                Rule::unique('zonas', 'nombre')->ignore($this->route('zona'))
            ],

            // Descripción opcional
            'descripcion' => 'nullable|string',

            // Aforo obligatorio, entero mayor a 0
            'aforo_maximo' => 'sometimes|integer|min:1',

            // Precio opcional, número >= 0
            'precio_cover' => 'nullable|numeric|min:0',

            // Estado obligatorio (1 o 0)
            'estado' => 'sometimes|in:1,0',
        ];
    }

    /**
     * Mensajes personalizados
     */
    public function messages(): array
    {
        return [

            'nombre' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 80 caracteres.',
            'nombre.unique' => 'Este nombre ya está registrado.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'aforo_maximo.required' => 'El aforo máximo es obligatorio.',
            'aforo_maximo.integer' => 'El aforo debe ser un número entero.',
            'aforo_maximo.min' => 'El aforo debe ser mayor a 0.',

            'precio_cover.numeric' => 'El precio debe ser un número.',
            'precio_cover.min' => 'El precio no puede ser negativo.',

            'estado' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser 1 (activo) o 0 (inactivo).',
        ];
    }
}
