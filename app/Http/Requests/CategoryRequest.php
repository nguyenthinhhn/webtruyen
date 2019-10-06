<?php
 namespace App\Http\Requests;
 use Illuminate\Foundation\Http\FormRequest;

 class CategoryRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => __('trans.name required'),
            'slug.required' => __('trans.slug required'),
            'meta_title.required' => __('trans.title required'),
            'meta_description.required' => __('trans.description is required'),
            'meta_keywords.required' => __('trans.meta_keywords is required'),
        ];
    }
}
