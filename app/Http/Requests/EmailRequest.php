<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class EmailRequest  extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.required'    => 'veuillez renseigner votre adresse email',
            'email.email'       => 'votre adresse email n\'est pas valide',
        ];
    }

    public function rules()
    {
        return [
            'email'         => 'required|email|max:255',
        ];
    }
}
