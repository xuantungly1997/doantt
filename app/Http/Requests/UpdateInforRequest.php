<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInforRequest extends FormRequest
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
//        $dataValidate = [
//            'name'=>'required|min:6|max:150',
//            'email'=>'required|min:6|unique:customer,email,'.$this->segment(2).',id',
//            'phone'=>'required|numeric|min:10',
//            'address'=>'required|max:500',
//            'birthday'=>'required',
//        ];
//        if($request->input('password')) {
//            $dataValidate['password'] = 'required|min:6|max:30';
//            $dataValidate['confirmpass'] = 'required|same:password';
//        }
//        return $dataValidate;
    }
}
