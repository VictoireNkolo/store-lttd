<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest  extends FormRequest
{

    public function authorize() {
        return true;
    }

    public function messages() {
        return [
            'email.required'    => 'veuillez renseigner votre adresse email',
            'email.email'       => 'votre adresse email n\'est pas valide',
            //'email.unique'      => 'cet adresse email est déjà utilisé',
            'password.required' => 'veuillez renseigner votre mot de passe'
        ];
    }

    public function rules() {
        return [
            'email'         => 'required|email|max:255',
            'password'      => 'required'
        ];
    }
}
