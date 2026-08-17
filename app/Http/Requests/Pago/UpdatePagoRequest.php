<?php

namespace App\Http\Requests\Pago;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePagoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'metodo' => [
                'sometimes',
                'required',
                Rule::in([
                    'efectivo',
                    'transferencia',
                    'tarjeta',
                    'mixto'
                ]),
            ],

            'monto' => [
                'sometimes',
                'required',
                'numeric',
                'min:0.01',
                'decimal:2',
            ],

            'referencia' => [
                'sometimes',
                'required',
                'string',
                'max:80',
            ],

            'fecha_pago' => [
                'sometimes',
                'required',
                'date',
            ],

            'estado' => [
                'sometimes',
                'required',
                Rule::in([
                    'exitoso',
                    'pendiente',
                    'fallido'
                ]),
            ],

            'venta_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:ventas,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'metodo.required' => 'El método de pago es obligatorio.',
            'metodo.in' => 'El método de pago no es válido.',

            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser numérico.',
            'monto.min' => 'El monto debe ser mayor a 0.',
            'monto.decimal' => 'El monto debe tener exactamente 2 decimales.',

            'referencia.required' => 'La referencia es obligatoria.',
            'referencia.string' => 'La referencia debe ser texto.',
            'referencia.max' => 'La referencia no puede superar los 80 caracteres.',

            'fecha_pago.required' => 'La fecha de pago es obligatoria.',
            'fecha_pago.date' => 'La fecha de pago no es válida.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado no es válido.',

            'venta_id.required' => 'La venta es obligatoria.',
            'venta_id.integer' => 'El ID de la venta debe ser un número entero.',
            'venta_id.exists' => 'La venta seleccionada no existe.',
        ];
    }
}
