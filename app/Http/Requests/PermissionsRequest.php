<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
            'id'           => 'exists:permissions,id',
            'name'         => 'required|string|min:3|max:20|unique:permissions,name,' . $this->id,
            'action'       => 'required|in:create,read,update,delete',
            'description'  => 'string|min:3|max:100|nullable',
        ];
    }
}
