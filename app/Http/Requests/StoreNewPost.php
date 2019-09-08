<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewPost extends FormRequest
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
            'title' => 'required|max:70',
            'description' => 'required|max:150',
            'category_id' => 'required',
            'published_at' => 'nullable',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:width=1200,height=628'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Es requerido un titulo para la publicación',
            'title.max' => 'El titulo excede los 70 carácteres',
            'description.required' => 'Es necesario escribir una descripción',
            'description.max' => 'La descripción excede los 150 carácteres',
            'category_id.required' => 'Es necesario elegir una categoría',
            'content.required' => 'Es necesario que lleve algo de contenido',
            'thumbnail.required' => 'No se subió ninguna imagen',
            'thumbnail.image.mimes' => 'El archivo subido no es una imagen',
            'thumbnail.max' => 'No se pueden subir imágenes con un peso mayor a 1mb',
            'thumbnail.dimensions' => 'Las dimensiones de la imagen deben ser de 1200 x 628 pixeles'
        ];
    }
}
