<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name.required'    => 'Veuillez renseigner  le nom de votre produit',
            'name.max' => 'Nom trop long',
            'description.required' => 'Veuillez renseigner la description',
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
            'price' => 'required|numeric|regex:/^(\d+(?:[\.\,]\d{1,2})?)$/',
            'weight' => 'required|numeric|regex:/^(\d+(?:[\.\,]\d{1,3})?)$/',
            'quantity' => 'required|numeric',
            'quantity_alert' => 'required|numeric',
        ];
    }
}
