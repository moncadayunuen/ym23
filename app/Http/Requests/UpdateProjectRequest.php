<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|max:125',
            'description' => 'required|max:165',
            'client' => 'required|max:200',
            'website' => 'required|max:255',
            'created' => 'required',
            'thumbnail' => 'image|mimes:jpeg,jpg,png,svg,gift|dimensions:width=460,height=530|max:1048',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Se necesita un titulo para el proyecto',
            'description.required' => 'Se necesita escribir la descripción del proyecto',
            'description.max' => 'La descripción excede los 165 carácteres',
            'client.required' => 'Se necesita escribir un nombre del cliente',
            'client.max' => 'El nombre del cliente excede los 200 carácteres',
            'website.required' => 'Se necesita escribir el sitio web del cliente',
            'website.max' => 'La dirección excede los 255 carácteres permitidos',
            'created.required' => 'Se necesita poner una fecha de creación para el proyecto',
            'thumbnail.image' => 'El archivo no es una imagen',
            'thumbnail.max' => 'El peso no debe exceder 1mb',
            'content.required' => 'Se necesita insertar algo de contenido para el proyecto'
        ];
    }
}
