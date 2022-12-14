<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
            'name.max' => 'Nom de catégorie trop long',
            'description.required' => 'Veuillez renseigner la description',
            'icon.required' => 'Veuillez renseigner l\'icône',
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
            'name'  => 'required|max:255|unique:product_categories,name,' . $this->id . ',id',
            'description'   => 'required',
            'icon'   => 'required',
        ];
    }

}
