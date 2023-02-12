<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidateRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'role_id' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password|min:8',
            'gender' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'cpassword.required' => 'Confirm Password field is required',
            'cpassword.same' => 'Confirm Password must be match!'
        ];
    }
}
