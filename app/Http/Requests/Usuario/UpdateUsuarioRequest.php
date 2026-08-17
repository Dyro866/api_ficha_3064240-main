<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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

            // Validar que el rol exista en la tabla roles
            'rol_id' => ['sometimes', 'integer', 'exists:roles,id'],

            // Nombre obligatorio, de tipo texto y máximo 100 caracteres
            'nombre' => ['sometimes', 'string', 'max:100'],

            // Email obligatorio, con formato válido y único en la tabla usuarios
            // Se ignora el email del usuario que se está actualizando
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('usuarios', 'email')->ignore($this->route('usuario'))
            ],

            // Contraseña opcional al actualizar, mínimo 8 y máximo 255 caracteres
            'password' => ['nullable', 'string', 'min:8', 'max:255'],

            // Teléfono opcional, de tipo texto y máximo 20 caracteres
            'telefono' => ['nullable', 'string', 'max:20'],

            // Estado obligatorio, acepta valores booleanos (0/1, true/false)
            'estado' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Get the custom validation messages.
     */
    public function messages(): array
    {
        return [
            'rol_id' => 'El rol es obligatorio.',
            'rol_id.integer' => 'El rol debe ser un número entero.',
            'rol_id.exists' => 'El rol seleccionado no existe.',

            'nombre' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede tener más de 100 caracteres.',

            'email' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'password.string' => 'La contraseña debe ser un texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede tener más de 255 caracteres.',

            'telefono.string' => 'El teléfono debe ser un texto.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',

            'estado' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser válido.',
        ];
    }
}
