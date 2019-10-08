<?php
 namespace App\Http\Requests;
 use Illuminate\Foundation\Http\FormRequest;
 class ChapterRequest extends FormRequest
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
            'description' => 'required',
            'name' => 'required|unique:chapters',
            'slug' => 'required|unique:chapters',
            'content' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'description.required' => __('trans.description required'),
            'name.required' => __('trans.name required'),
            'name.unique' => __('trans.name chapter is unique'),
            'slug.required' => __('trans.slug required'),
            'slug.unique' => __('trans.slug is unique'),
            'content.required' => __('trans.content required'),
        ];
    }
}
