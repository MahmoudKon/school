<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamsRequest extends FormRequest
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
            'user_id'     => 'required|exists:users,id',
            'subject_id'  => 'required|exists:subjects,id',
            'time'        => 'required|integer|between:60,180',
            'degree'      => 'required|integer|between:10,180',
            'name'        => 'required|min:3|max:199|string',
        ];
    }
}
