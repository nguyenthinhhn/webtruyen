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
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'name.required' => __('trans.name category required'),
            'name.unique' => __('trans.name category unique'),
            'slug.required' => __('trans.slug required'),
            'slug.unique' => __('trans.slug unique'),
            'meta_title.required' => __('trans.title required'),
            'meta_description.required' => __('trans.description is required'),
        ];
    }
}
