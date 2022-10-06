<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title.required'    => 'Veuillez renseigner  le titre de votre article',
            'title.unique'      => 'Cet article existe déjà !',
            'title.max' => 'Titre trop long',
            'description.required' => 'Veuillez renseigner la description',
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
            'title'  => 'required|max:255|unique:posts,title,' . $this->id . ',id',
            'description'   => 'required',
        ];
    }
}
