<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'lastname' => 'required|max:255',
            'email' => 'required', Rule::unique('users')->ignore($this->route('user')->id),
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=150,height=150|max:1048'
        ];

        if($this->filled('password'))
        {
            $rules['password'] = ['confirmed', 'min:8'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Es necesario ingresar un nombre de usuario',
            'lastname.required' => 'Es necesario escribir un apellido',
            'lastname.max' => 'Se excedieron los 255 carácteres permitidos',
            'email.required' => 'Es necesario ingresar un correo electrónico',
            'password.confirmed' => 'La contraseña de confirmación es diferente',
            'password.min' => 'La contraseña debe tener al menos 8 carácteres',
            'avatar.image' => 'El archivo debe ser una imagen',
            'avatar.max' => 'El peso no debe ser mayor a 1mb',
            'avatar.dimensions' => 'Las dimensiones de la imagen no son las correctas'
        ];
    }
}
