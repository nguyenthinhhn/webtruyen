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
            'name' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'description.required' => __('trans.description required'),
            'name.required' => __('trans.name required'),
            'slug.required' => __('trans.slug required'),
            'content.required' => __('trans.content required'),
        ];
    }
}
