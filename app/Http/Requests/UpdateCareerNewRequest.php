<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCareerNewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:60',
            'description' => 'required|max:155',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=800,height=800|max:1048',
            'cv_file' => 'mimes:pdf|max:3000',
            'subtitle' => 'required|max:80',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Es requerido un titulo para la página',
            'title.max' => 'El titulo excede los 60 carácteres',
            'description.required' => 'Es necesario escribir una descripción',
            'description.max' => 'La descripción excede los 155 carácteres',
            'photo.image' => 'El archivo no es una imagen',
            'photo.max' => 'El peso de la imagen es mayor a 1mb',
            'photo.dimensions' => 'Las dimensiones de la imagen no son las correctas',
            'cv_file.max' => 'El peso no debe ser mayor a 3mb',
            'cv_file.mimes' => 'Solo se admite el formato PDF',
            'subtitle.required' => 'Es requerido un subtitulo para la página',
            'subtitle.max' => 'El subtitulo excede los 80 carácteres',
            'content' => 'Se necesita algo de contenido',
        ];
    }
}
