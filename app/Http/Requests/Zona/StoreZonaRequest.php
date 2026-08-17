<?php

namespace App\Http\Requests\Zona;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreZonaRequest extends FormRequest
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
            // Nombre obligatorio, texto, máximo 80 caracteres y único en la tabla zonas
            'nombre' => 'required|string|max:80|unique:zonas,nombre',

            // Descripción opcional, tipo texto
            'descripcion' => 'nullable|string',

            // Aforo obligatorio, número entero positivo (mínimo 1)
            'aforo_maximo' => 'required|integer|min:1',

            // Precio opcional, número decimal mayor o igual a 0
            'precio_cover' => 'nullable|numeric|min:0',

            // Estado obligatorio, solo permite 1 (activo) o 0 (inactivo)
            'estado' => 'required|in:1,0',
        ];
    }

    /**
     * Mensajes personalizados en español
     */
    public function messages(): array
    {
        return [

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 80 caracteres.',
            'nombre.unique' => 'Este nombre ya está registrado.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'aforo_maximo.required' => 'El aforo máximo es obligatorio.',
            'aforo_maximo.integer' => 'El aforo debe ser un número entero.',
            'aforo_maximo.min' => 'El aforo debe ser mayor a 0.',

            'precio_cover.numeric' => 'El precio debe ser un número.',
            'precio_cover.min' => 'El precio no puede ser negativo.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser 1 (activo) o 0 (inactivo).',
        ];
    }
}

