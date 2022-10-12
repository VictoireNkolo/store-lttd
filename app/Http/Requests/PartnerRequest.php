<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name.required'    => 'Veuillez renseigner  le nom du mannequin',
            'name.max' => 'Nom trop long',
            'description.required' => 'Veuillez renseigner la description',
            'link.required' => 'Veuillez renseigner le lien du site web du partenaire',
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
            'name' => 'required|max:255',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
            'link' => 'required',
        ];
    }
}
