<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessCardRequest extends FormRequest
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
            'corp_id' => 'required|integer',
            'division' => 'required|string',
            'title' => 'nullable||max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠])[a-zA-Zぁ-んァ-ヶ一-龠0-9\-]+$/u',
            'employee_name' => 'required|string|max:50|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠])[a-zA-Zぁ-んァ-ヶ一-龠0-9\-]+$/u',
            'mobile_phone' => 'required|string|max:13|regex:/^[0-9]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'corp_id.required' => '何かの不具合でcorp_idが自動指定されていません。',
            'division.required' => '所属部署を選択してください。',
            'title.max' => '役職は100文字以内で記入してください。',
            'title.regex' => '役職の登録に数字のみや、記号のみでの登録はできません。',
            'employee_name.required' => '名前を入力してください。',
            'employee_name.max' => '名前は50文字以内で入力してください。',
            'employee_name.regex' => '名前の登録に数字のみや、記号のみでの登録はできません。',
            'mobile_phone.required' => '携帯番号を入力してください。',
            'mobile_phone.regex' => '携帯番号の登録に数字以外の登録はできません。',
        ];
    }
}
