<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define las reglas de validación para actualizar un cliente.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            // El documento es obligatorio, debe ser texto,
            // tener máximo 20 caracteres y ser único,
            // excepto el documento del cliente que se está actualizando.
            'documento' => [
                'sometimes',
                'string',
                'max:20',
                Rule::unique('clientes', 'documento')->ignore($this->cliente),
            ],

            // Los nombres son obligatorios,
            // deben ser texto y tener máximo 80 caracteres.
            'nombres' => 'sometimes|string|max:80',

            // Los apellidos son obligatorios,
            // deben ser texto y tener máximo 80 caracteres.
            'apellidos' => 'sometimes|string|max:80',

            // El correo electrónico es opcional.
            // Si se registra, debe tener un formato válido,
            // máximo 150 caracteres y ser único,
            // excepto el correo del cliente que se está actualizando.
            'email' => [
                'nullable',
                'email',
                'max:150',
                Rule::unique('clientes', 'email')->ignore($this->cliente),
            ],

            // El teléfono es obligatorio,
            // debe ser texto y tener máximo 20 caracteres.
            'telefono' => 'sometimes|string|max:20',

            // La fecha de nacimiento es opcional,
            // pero si se proporciona debe ser una fecha válida.
            'fecha_nacimiento' => 'nullable|date',

            // El tipo de cliente es obligatorio
            // y únicamente puede ser: regular, vip o corporativo.
            'tipo' => 'sometimes|in:regular,vip,corporativo',
        ];
    }

    /**
     * Define los mensajes personalizados de validación en español.
     */
    public function messages(): array
    {
        return [

            // Mensajes para el campo documento
            'documento.sometimes' => 'El documento es obligatorio.',
            'documento.string' => 'El documento debe ser un texto.',
            'documento.max' => 'El documento no puede tener más de 20 caracteres.',
            'documento.unique' => 'El documento ya se encuentra registrado.',

            // Mensajes para el campo nombres
            'nombres.sometimes' => 'Los nombres son obligatorios.',
            'nombres.string' => 'Los nombres deben ser un texto.',
            'nombres.max' => 'Los nombres no pueden tener más de 80 caracteres.',

            // Mensajes para el campo apellidos
            'apellidos.sometimes' => 'Los apellidos son obligatorios.',
            'apellidos.string' => 'Los apellidos deben ser un texto.',
            'apellidos.max' => 'Los apellidos no pueden tener más de 80 caracteres.',

            // Mensajes para el campo email
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 150 caracteres.',
            'email.unique' => 'El correo electrónico ya se encuentra registrado.',

            // Mensajes para el campo teléfono
            'telefono.sometimes' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser un texto.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',

            // Mensajes para la fecha de nacimiento
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',

            // Mensajes para el tipo de cliente
            'tipo.sometimes' => 'El tipo de cliente es obligatorio.',
            'tipo.in' => 'El tipo de cliente debe ser regular, vip o corporativo.',
        ];
    }
}
