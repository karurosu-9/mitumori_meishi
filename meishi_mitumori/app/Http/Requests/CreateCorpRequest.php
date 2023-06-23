<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCorpRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'corp_name' => 'required|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠])[a-zA-Zぁ-んァ-ヶ一-龠0-9\-]+$/u',
            'postal_code' => 'required|string|regex:/^[0-9]{7}$/u',
            'address' => 'required|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠])[a-zA-Zぁ-んァ-ヶ一-龠0-9\-]+$/u',
            'tel' => 'required|string|max:12|regex:/^[0-9]{10,12}$/u',
        ];
    }

    public function messages()
    {
        return [
            'corp_name.required' => '会社名は必ず入力してください。',
            'corp_name.max' => '会社名は255文字以下で入力してください。',
            'corp_name.regex' => '会社名には数字のみや、記号を含めることはできません。',
            'postal_code.required' => '郵便番号は必ず入力してください。',
            'postal_code.regex' => '郵便番号はハイフンを入れずに半角数字で入力してください。',
            'address.required' => '住所は必ず入力してください。',
            'address.max' => '住所は255文字以下で入力してください。',
            'address.regex' => '住所は数字のみや記号を含めることはできません。',
            'tel.required' => '電話番号は必ず入力してください。',
            'tel.max' => '電話番号は12文字以下で入力してください。',
            'tel.regex' => '電話番号はハイフンを入れずに半角数字で入力してください。',
        ];
    }
}
