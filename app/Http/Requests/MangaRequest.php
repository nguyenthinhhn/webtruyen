<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MangaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:mangas',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('trans.name required'),
            'name.unique' => __('trans.name manga is unique'),
            'slug.required' => __('trans.slug required'),
            'description.required' => __('trans.description required'),
            'image.required' => __('trans.image required'),
        ];
    }
}
