<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|max:255|unique:users',
            'password1_add' => 'required|min:5',
            'username' => 'required|min:5',
            'fullname' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('trans.Email is required'),
            'email.unique' => __('trans.Email is unique!'),
            'email.max' => __('trans.Email is max'),
            'password1_add.required' => __('trans.Password is required'),
            'password1_add.min' => __('trans.Password is too short'),
            'username.min' => __('trans.username min'),
            'username.required' => __('trans.username required'),
            'fullname.min' => __('trans.fullname min'),
            'fullname.required' => __('trans.fullname required'),
        ];
    }
}
