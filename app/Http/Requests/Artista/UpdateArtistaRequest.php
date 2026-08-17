<?php

namespace App\Http\Requests\Artista;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArtistaRequest extends FormRequest
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
            'nombre_artistico' => [
                'sometimes',
                'string',
                'max:100',
                Rule::unique('djs_artistas', 'nombre_artistico')
                    ->ignore($this->artista),
            ],

            'nombre_real' => [
                'sometimes',
                'nullable',
                'string',
                'max:120',
            ],

            'genero_musical' => [
                'sometimes',
                'string',
                'max:60',
            ],

            'biografia' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'contacto' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
            ],

            'cache_base' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
                'decimal:0,2',
            ],

            'estado' => [
                'sometimes',
                'boolean',
            ],
        ];
    }
}