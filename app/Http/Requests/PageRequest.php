<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title.required'    => 'Veuillez renseigner  le titre de la page',
            'title.unique'      => 'Cette page existe déjà !',
            'title.max' => 'Nom de page trop long !',
            'text.required' => 'Veuillez renseigner le contenu de la page',
            'menu_position.required' => 'Veuillez choisir la position dans le menu',
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
            'title'  => 'required|max:50|unique:pages,title,' . $this->id . ',id',
            'text'   => 'required',
            'menu_position'   => 'required',
        ];
    }
}
