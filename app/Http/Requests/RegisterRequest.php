<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'regex:/^([^0-9]*)$/',
            'email' => 'unique:users,email',
            'password' => 'min:6|max:20',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages(){
        return [
            'name.regex' => 'Tên không chứa kí tự số!',
            'email.unique' => 'Email đã tồn tại!',
            'password.min' => 'Password phải có ít nhất 6 kí tự!',
            'password.max' => 'Password chỉ có tối đa 20 kí tự!',
            'password_confirmation.same' => 'Nhập lại password ko chính xác!'
        ];
    }
}
