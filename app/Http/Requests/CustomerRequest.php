<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the customer is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

      if((isset($this->action)) && (($this->action) == "store") ){
        return [
            'name'  => 'required|min:3|unique:customers,name|regex:/^([^0-9]*)$/',
            'email' => 'required|email|unique:customers,email'

        ];
      }else{
        return [
            'name'  => 'required|min:3|regex:/^([^0-9]*)$/',
            'email' => 'required|email'
        ];
      } 
    }

    public function messages()
    {
        return [
            'name.required'  => 'Customer name is required',
            'name.min'       => 'Customer name must be three or more character long',
            'email.required' => 'Customer email is required'
        ];
    }
}
