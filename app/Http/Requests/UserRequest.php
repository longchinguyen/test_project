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
            'name'=>'required|unique:users,name',
            'email'=>'required|email|unique:users,email'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'name field is required',
            'name.required'=>'this name is in used',
            'email.required'=>'email khong de trong',
            'email.required'=>'email dat chuan'
        ];
    }
}
