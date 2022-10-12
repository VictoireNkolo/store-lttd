<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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

    public function messages()
    {
        return [
            'client.required'    => 'Veuillez renseigner  le nom du client',
            'client.max' => 'Nom trop long',
            'comment.required' => 'Veuillez renseigner le commentaire',
            'image.required' => "L'image est obligatoire",
            'image.image' => "Le fichier choisi doit être de type image",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client' => 'required|max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
            'comment' => 'required',
        ];
    }
}
