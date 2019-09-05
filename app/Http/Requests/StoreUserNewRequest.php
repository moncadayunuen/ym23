<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserNewRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=150,height=150|max:1048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Es requerido un nombre para el usuario',
            'name.max' => 'El nombre de usuario excede los 255 carácteres',
            'lastname.required' => 'Es necesario escribir un apellido',
            'lastname.max' => 'El apellido excede los 255 carácteres',
            'email.required' => 'Es necesario ingresar un correo electrónico',
            'email.unique' => 'Ya existe un correo registrado con ese nombre',
            'avatar.image' => 'El archivo debe ser una imagen',
            'avatar.max' => 'El peso no debe ser mayor a 1mb',
            'avatar.dimensions' => 'Las dimensiones de la imagen no son las correctas'
        ];
    }
}
