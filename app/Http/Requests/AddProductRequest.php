<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'=>'required|min:6|unique:product',
            'color'=>'required',
            'file'=>'required',
            'description'=>'required',
            'size'=>'required',
            'default_price'=>'required|numeric',
            'unit_price'=>'required|numeric',
            'promotion_price'=>'required|numeric|between:0,100',
            'producter'=>'required',
            'amount'=>'required|numeric',

        ];
    }
}
