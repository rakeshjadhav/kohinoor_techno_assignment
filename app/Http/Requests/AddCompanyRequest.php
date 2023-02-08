<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCompanyRequest extends FormRequest
{
   
    public function rules():array
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|unique:companies,name,NULL,id,deleted_at,NULL',
            'address' => 'required|max:50',
        ];
    }

    public function messages(){

        $messages =  [ 
             'name.required' => 'Company name is required',
             'name.regex' => 'The company name format is invalid only alphabets numbers and space allowed',
             'address.required' => 'Address email is required',
            ];
        return $messages;
      }
}
