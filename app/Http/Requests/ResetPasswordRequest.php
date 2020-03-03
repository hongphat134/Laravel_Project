<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'min:6|max:20',
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages(){
        return [
            'password.min' => 'Mật khẩu pải có ít nhất 6 kí tự!',
            'password.max' => 'Mật khẩu chỉ có tối đa 20 kí tự!',
            'password_confirmation.same' => 'Confirm password chưa chính xác!'
        ];      
    }
}
