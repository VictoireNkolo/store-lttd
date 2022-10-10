<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProductSubcategoryRequest extends FormRequest
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
            'name.required'    => 'Veuillez renseigner  le nom de la catégorie',
            'name.unique'      => 'Cette catégorie existe déjà !',
            'name.max' => 'Nom de la sous-catégorie trop long',
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
            'name'  => 'required|max:255',
            'description'   => 'required',
            'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
        ];
    }

}
