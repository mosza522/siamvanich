<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class requestRecover extends FormRequest
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
          'username' => 'required',
          'iden' => 'required|min:13',
          'birthday' => 'required|min:8',
        ];
    }
    public function messages()
    {
    return [
        'username.required' => 'กรุณากรอก Username',
        'username.numeric' => 'ช่อง Username กรอกได้เฉพาะตัวเลข',
        'iden.required' => 'กรุณากรอกข้อมูลในช่อง ใส่เลขบัตรประชาชน',
        'iden.min' => 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง',
        'birthday.required' => 'กรุณากรอกวันเดือนปีเกิด',
        'birthday.min' => 'กรุณากรอกวันเดือนปีที่เกิดให้ถูกต้อง',
    ];
  }
}
