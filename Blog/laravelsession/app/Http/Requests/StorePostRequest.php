<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'product_name'=>'required|max:100',
            'product_desc'=>'required',
            // 'image'=>'required',
            'price'=>'required',
            'category_id'=>'required'
        ];
    }

    //error messages
    public function messages()
    {
        return [
            'required'=>'The :attribute is required',
            'product_desc.required'=>'Please give a few lines description',
        ];
    }
}
