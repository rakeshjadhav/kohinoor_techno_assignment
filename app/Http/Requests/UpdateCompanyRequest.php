<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
   
    public function rules()
    {
        $companyD = $this->route()->parameters();
        $id = $companyD['id'];
        
        return [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u|unique:companies,name,NULL,id,deleted_at,NULL'.$id,
            'address' => 'required|max:50'
        ];
    }

    public function messages(){

        $messages =  [ 
             'name.required' => 'Company name is required',
             'name.regex' => 'The company name format is invalid only alphabets numeric and space allowed',
             'address.required' => 'Address is required',
            ];
        return $messages;
      }
}
