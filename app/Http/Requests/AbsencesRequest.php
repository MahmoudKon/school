<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbsencesRequest extends FormRequest
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
            'user_id'   => 'required|exists:users,id',
            'code_id'   => 'required|exists:users,code',
            'note'      => 'string|min:5|max:50|nullable',
            'status'    => 'in:0,1|nullable',
        ];
    }
}
