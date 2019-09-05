<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostEditRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'description' => 'required|max:80',
            'category_id' => 'required',
            'published_at' => 'nullable',
            'content' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048|dimensions:min_width=1200,max_width=1200,min_height=628,max_height=628'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Es requerido un titulo para la publicación',
            'title.max' => 'El titulo excede los 50 carácteres',
            'description.required' => 'Es necesario escribir una descripción',
            'description.max' => 'La descripción excede los 80 carácteres',
            'category_id.required' => 'Es necesario elegir una categoría',
            'content.required' => 'Es necesario que lleve algo de contenido',
            'thumbnail.image' => 'El archivo debe ser una imagen',
            'thumbnail.max' => 'El peso no debe ser mayor a 1mb',
            'thumbnail.dimensions' => 'Las dimensiones de la imagen no son las correctas'
        ];
    }
}
