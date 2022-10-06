<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest  extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'password.required' => 'Veuillez renseigner le mot de passe',
            'password.min' => 'Le mot de passe doit être composé de 6 caractères au moins',
            'password.confirmed' => 'Le mot de passe de confirmation doit être identique',
        ];
    }

    public function rules()
    {
        return [
            'password'      => 'required|min:6|confirmed',
        ];
    }
}
