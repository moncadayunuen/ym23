<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'description' => 'required|max:80',
            'thumbnail' => 'image|mimes:jpeg,jpg,png,PNG,svg,gift|dimensions:width=360,height=220|max:1048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Es necesario escribir un nombre para la categoría',
            'name.max' => 'El nombre excede los 30 carácteres permitidos',
            'description.required' => 'Es necesario escribir una descripción para la categoría',
            'description.max' => 'La descripción excede los 80 carácteres permitidos',
            'thumbnail.image' => 'El archivo seleccionado no es una imagen',
            'thumbnail.dimensions' => 'Las dimensiones de la imagen no son las correctas',
            'thumbnail.mimes' => 'Este tipo de formato no está permitido',
            'thumbnail.max' => 'Solo se permiten imágenes menores a 1mb'
        ];
    }
}
