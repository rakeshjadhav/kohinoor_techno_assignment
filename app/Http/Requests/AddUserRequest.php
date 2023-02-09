<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
   
    public function rules():array
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'email' => 'required|email|unique:users,email',
            'dob' => 'required|date',
            'photo' => 'mimes:jpg,jpeg,bmp,png',
        ];
    }

    public function messages(){

        $messages =  [ 
             'name.required' => 'User name is required',
             'name.regex' => 'The user name format is invalid only alphabets numbers and space allowed',
             'email.required' => 'User email is required',
             'dob.required' => 'User birth of date is required'
            ];
        return $messages;
      }
}
