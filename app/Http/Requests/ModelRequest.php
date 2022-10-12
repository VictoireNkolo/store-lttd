<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
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
            'phone.required' => 'Veuillez renseigner le téléphone',
            'products_purchased.required' => 'Veuillez renseigner la quantité de produits achetés',
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
            'phone' => 'required',
            'products_purchased' => 'required|numeric',
        ];
    }
}
