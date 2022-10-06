<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserRequest  extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.required'    => 'Veuillez renseigner  l\'adresse email',
            'email.email'       => 'Votre adresse email n\'est pas valide',
            'email.unique'      => 'Cette adresse email est déjà utilisée',
            'password.required' => 'Veuillez renseigner le mot de passe',
            'password.min' => 'Le mot de passe doit être composé de 6 caractères au moins',
            'password.confirmed' => 'Le mot de passe de confirmation doit être identique',
            'name.required' => 'Veuillez renseigner le nom',
            'name.regex' => 'Format de nom invalide, alphanmérique uniquement',
            'role.required' => 'Veuillez renseigner le rôle',
        ];
    }

    public function rules()
    {
        return [
            'email'         => 'required|max:255|email|unique:users,email,' . $this->id . ',id',
            'password'      => 'required|min:6|confirmed',
            'name'      => ['required',], //A compléter pour les reg_ex de preg_match
            'role'      => 'required',
        ];
    }
}
