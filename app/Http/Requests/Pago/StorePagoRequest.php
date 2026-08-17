<?php

namespace App\Http\Requests\Pago;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePagoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
             return [
            'metodo' => [
                'required',
                Rule::in(['efectivo', 'transferencia', 'tarjeta', 'mixto']),
            ],

            'monto' => [
                'required',
                'numeric',
                'min:0.01',
                'decimal:2',
            ],

            'referencia' => [
                'required',
                'string',
                'max:80',
            ],

            'fecha_pago' => [
                'required',
                'date',
            ],

            'estado' => [
                'required',
                Rule::in(['exitoso', 'pendiente', 'fallido']),
            ],

            'venta_id' => [
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
            'metodo.in' => 'El método de pago seleccionado no es válido.',

            'monto.required' => 'El monto es obligatorio.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.min' => 'El monto debe ser mayor a 0.',
            'monto.decimal' => 'El monto debe tener exactamente 2 decimales.',

            'referencia.required' => 'La referencia es obligatoria.',
            'referencia.string' => 'La referencia debe ser texto.',
            'referencia.max' => 'La referencia no puede superar los 80 caracteres.',

            'fecha_pago.required' => 'La fecha de pago es obligatoria.',
            'fecha_pago.date' => 'La fecha de pago no tiene un formato válido.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',

            'venta_id.required' => 'La venta es obligatoria.',
            'venta_id.integer' => 'El ID de la venta debe ser un número entero.',
            'venta_id.exists' => 'La venta seleccionada no existe.',
        ];
    }
        ];
    }
}
