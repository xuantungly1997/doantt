<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            //
            'name'=>'required|min:5|max:150',
            'email'=>'required|unique:users,email,'.$this->segment(4).',id',
            'phone'=>'required|numeric|min:10',
            'address'=>'required|max:500'
        ];
    }
    public function messages(){
        return[
            //
//            'email.unique'=>'email đã được sử dụng'
        ];
    }
}
