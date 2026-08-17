<?php

namespace App\Http\Requests\Reserva;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fecha_reserva' => 'required|date',
            'cantidad_personas' => 'required|integer|min:1|max:255',
            'anticipo' => 'nullable|numeric|min:0',
            'observaciones' => 'nullable|string',
            'estado' => 'required|in:pendiente,cancelada,asistio',
            'cliente_id' => 'required|integer|exists:clientes,id',
            'mesa_id' => 'required|integer|exists:mesas,id',
            'evento_id' => 'required|integer|exists:eventos,id',
            'empleado_id' => 'required|integer|exists:empleados,id',
        ];
    }

    public function messages(): array
    {
        return [
            'fecha_reserva.required' => 'La fecha de reserva es obligatoria.',
            'fecha_reserva.date' => 'La fecha de reserva debe ser una fecha válida.',
            'cantidad_personas.required' => 'La cantidad de personas es obligatoria.',
            'cantidad_personas.integer' => 'La cantidad de personas debe ser un número entero.',
            'cantidad_personas.min' => 'Debe haber al menos una persona.',
            'anticipo.numeric' => 'El anticipo debe ser un valor numérico.',
            'anticipo.min' => 'El anticipo no puede ser negativo.',
            'observaciones.string' => 'Las observaciones deben ser texto.',
            'estado.required' => 'El estado de la reserva es obligatorio.',
            'estado.in' => 'El estado debe ser pendiente, cancelada o asistio.',
            'cliente_id.required' => 'El cliente es obligatorio.',
            'cliente_id.exists' => 'El cliente seleccionado no existe.',
            'mesa_id.required' => 'La mesa es obligatoria.',
            'mesa_id.exists' => 'La mesa seleccionada no existe.',
            'evento_id.required' => 'El evento es obligatorio.',
            'evento_id.exists' => 'El evento seleccionado no existe.',
            'empleado_id.required' => 'El empleado es obligatorio.',
            'empleado_id.exists' => 'El empleado seleccionado no existe.',
        ];
    }
}
