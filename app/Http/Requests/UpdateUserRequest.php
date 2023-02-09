<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    
    public function rules()
    {
        $emplyee = $this->route()->parameters();
        $id = $emplyee['id'];
        
        return [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'email' => 'required|email|unique:users,email,'.$id,
            'dob' => 'required|date',
            'photo' => 'mimes:jpg,jpeg,bmp,png',
        ];
    }

    public function messages(){

        $messages =  [ 
             'name.required' => 'User name is required',
             'name.regex' => 'The user name format is invalid only alphabets numeric and space allowed',
             'email.required' => 'User email is required',
             'dob.required' => 'User date of birth is required'
            ];
        return $messages;
      }
}
