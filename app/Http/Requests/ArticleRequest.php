<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// フォームリクエストバリデーション
class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //-- この行を変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // バリデーションのルールを定義
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'body' => 'required|max:500',
        ];
    }

    // バリデーションエラーメッセージに表示される項目名をカスタマイズ
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
        ];
    }
}
