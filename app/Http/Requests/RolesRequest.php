<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            'id'           => 'exists:roles,id',
            'name'         => 'required|string|min:3|max:20|unique:roles,name,' . $this->id,
            'display_name' => 'required|string|min:3|max:50|unique:roles,display_name,' . $this->id,
            'description'  => 'string|min:3|max:100|nullable',
            'permissions'  => 'nullable',
        ];
    }
}
