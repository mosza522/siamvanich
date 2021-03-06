<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdmin extends FormRequest
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
          'username' => 'unique:tb_admin,admin_username,'
        ];
    }
    public function messages()
    {
    return [
        'username.unique' => 'Username นี้มีผู้ใช้แล้ว',
    ];
  }
}
