<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == '/') {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'email' => 'required|email|string|max:191|unique:users',
            'password' => 'required|min:2|max:191|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'ユーザー名を入力してください',
            'name.string' => '正しい形式で入力してください',
            'name.max' => '文字数をオーバーしています。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しい形式でメールアドレスを入力してください',
            'email.max' => '文字数をオーバーしています。',
            'email.unique' => '登録済みのユーザーです',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => '文字数をオーバーしています。',
            'password.confirmed' => 'パスワードが一致しません。',
        ];
    }

     protected function getRedirectUrl()
    {
        return 'verror';
    }
}
