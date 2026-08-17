<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            // El documento es obligatorio, debe ser texto, 
            // tener máximo 20 caracteres y ser único en la tabla clientes. 
            'documento' => 'required|string|max:20|unique:clientes,documento', 
        
            // Los nombres son obligatorios, 
            // deben ser texto y tener máximo 80 caracteres.
            'nombres' => 'required|string|max:80', 
        
            // Los apellidos son obligatorios, 
            // deben ser texto y tener máximo 80 caracteres. 
            'apellidos' => 'required|string|max:80', 
        
            // El correo electrónico es opcional. 
            // Si se registra, debe tener un formato válido, 
            // máximo 150 caracteres y no estar repetido. 
            'email' => 'nullable|email|max:150|unique:clientes,email', 
        
            // El teléfono es obligatorio, 
            // debe ser texto y tener máximo 20 caracteres. 
            'telefono' => 'required|string|max:20', 
        
            // La fecha de nacimiento es opcional, 
            // pero si se proporciona debe ser una fecha válida. 
            'fecha_nacimiento' => 'nullable|date', 
        
            // El tipo de cliente es obligatorio 
            // y únicamente puede ser: regular, vip o corporativo. 
            'tipo' => 'required|in:regular,vip,corporativo',
        ];
    }

    public function messages(): array 
    { 
        return [ 
            // Mensajes para el campo documento 
            'documento.required' => 'El documento es obligatorio.', 
            'documento.string' => 'El documento debe ser un texto.', 
            'documento.max' => 'El documento no puede tener más de 20 caracteres.', 
            'documento.unique' => 'El documento ya se encuentra registrado.', 
            
            // Mensajes para el campo nombres 
            'nombres.required' => 'Los nombres son obligatorios.', 
            'nombres.string' => 'Los nombres deben ser un texto.', 
            'nombres.max' => 'Los nombres no pueden tener más de 80 caracteres.', 
            
            // Mensajes para el campo apellidos 
            'apellidos.required' => 'Los apellidos son obligatorios.', 
            'apellidos.string' => 'Los apellidos deben ser un texto.', 
            'apellidos.max' => 'Los apellidos no pueden tener más de 80 caracteres.', 
            
            // Mensajes para el campo email 
            'email.email' => 'El correo electrónico debe tener un formato válido.', 
            'email.max' => 'El correo electrónico no puede tener más de 150 caracteres.', 
            'email.unique' => 'El correo electrónico ya se encuentra registrado.', 
            
            // Mensajes para el campo teléfono 
            'telefono.required' => 'El teléfono es obligatorio.', 
            'telefono.string' => 'El teléfono debe ser un texto.', 
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.', 
            
            // Mensajes para la fecha de nacimiento 
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.', 
            
            // Mensajes para el tipo de cliente 
            'tipo.required' => 'El tipo de cliente es obligatorio.', 
            'tipo.in' => 'El tipo de cliente debe ser regular, vip o corporativo.', 
        ];
    }
}
