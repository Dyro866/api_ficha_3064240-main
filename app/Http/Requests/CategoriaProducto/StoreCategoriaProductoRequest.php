<?php

namespace App\Http\Requests\CategoriaProducto;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100', 'unique:categorias_producto,nombre'],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'descripcion.string' => 'La descripción debe ser un texto válido.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}
