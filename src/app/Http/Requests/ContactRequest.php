<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        'first-name' => 'required|string|max:50',
        'last-name' => 'required|string|max:50',
        'gender' => 'required|in:1,2',
        'email' => 'required|email|max:255',
        'postcode' => 'required|regex:/^\d{3}-\d{4}$/',
        'address' => 'required|string|max:255',
        'opinion' => 'required|string|max:120',
        ];
    }


    public function messages()
{
    return [
            'first-name.required' => 'は必須です。',
        'last-name.required' => '苗字は必須です。',
        'gender.required' => '性別は必須です。',
        'email.required' => 'メールアドレスは必須です。',
        'email.email' => '正しいメールアドレス形式で入力してください。',
        'postcode.required' => '郵便番号は必須です。',
        'postcode.regex' => '郵便番号は正しい形式で入力してください。',
        'address.required' => '住所は必須です。',
        'opinion.required' => 'ご意見は必須です。',
    ];
}
}
