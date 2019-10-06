<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'fullname' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'fullname.min' => __('trans.fullname min'),
            'fullname.required' => __('trans.fullname required'),
        ];
    }
}
