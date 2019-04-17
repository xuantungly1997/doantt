<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddCustomerRequest extends FormRequest
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
    public function rules(Request $requests)
    {
//        dd($requests->all());
        return [
            //
            'name'=>'required|min:6|max:150',
            'email'=>'required|unique:customer',
            'password'=>'required|min:6|max:30',
            'phone'=>'required|numeric|min:10',
            'address'=>'required|max:500',
            'birthday'=>'required',
            'confirmpass'=>'required|same:password',
        ];
    }
}
