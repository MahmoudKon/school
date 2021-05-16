<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
        $is_req = $this->id ? '' : 'required';
        return [
            'username'               => 'required|string|min:5|max:25|unique:users,username,' . $this->id,
            'full_name'              => 'required|string|min:5|max:50',
            'email'                  => 'required|email|unique:users,email,' . $this->id,
            'address'                => 'required|string|min:10|max:100',
            'phone'                  => 'required|string|min:11|max:25|unique:users,phone,' . $this->id,
            'personal_id'            => 'required|digits:14|unique:users,personal_id,' . $this->id,
            'age'                    => 'required|integer|between:20,100',
            'role'                   => 'required',
            'password'               => $is_req . '|min:3|max:25|confirmed|nullable',
            'password_confirmation'  => 'same:password',
            'image'                  => 'image|mimes:jpeg,png,jpg,gif,svg|max:8080',
        ];
    }
}
