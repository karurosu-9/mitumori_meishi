<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEstimateRequest extends FormRequest
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
            'corp_id' => 'required|integer|regex:/^[0-9]+$/u',
            'date' => 'required|date|date_format:Y-m-d',
            'tekiyo1' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'unit_price1' => 'required|string|max:50|regex:/^[0-9]+$/u',
            'quantity1' => 'required|string|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            'amount1' => 'required|string|max:50|regex:/^[0-9]+$/u',
            'note1' => 'nullable|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //インデックス番号２
            'tekiyo2' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //単価と数量の両方に値が入っていないとエラーになる。片方だけではダメ(３～５も同じ)
            'unit_price2' => 'nullable|required_with:quantity2|max:50|regex:/^[0-9]+$/u',
            'quantity2' => 'nullable|string|required_with:unit_price2|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            //金額に値が入っている場合は、単価と数量に値は必須(３～５も同じ)
            'amount2' => 'nullable|string|required_with:unit_price2, quantity2|max:50|regex:/^[0-9]+$/u',
            'note2' => 'nullable|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //インデックス番号３
            'tekiyo3' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'unit_price3' => 'nullable|string|required_with:quantity3|max:50|regex:/^[0-9]+$/u',
            'quantity3' => 'nullable|string|required_with:unit_price3|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            'amount3' => 'nullable|string|required_with:unit_price3, quantity3|max:50|regex:/^[0-9]+$/u',
            'note3' => 'nullable|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //インデックス番号４
            'tekiyo4' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'unit_price4' => 'nullable|string|required_with:quantity4|max:50|regex:/^[0-9]+$/u',
            'quantity4' => 'nullable|string|required_with:unit_price4|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            'amount4' => 'nullable|string|required_with:unit_price4, quantity4|max:50|regex:/^[0-9]+$/u',
            'note4' => 'nullable|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //インデックス番号５
            'tekiyo5' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'unit_price5' => 'nullable|string|required_with:quantity5|max:50|regex:/^[0-9]+$/u',
            'quantity5' => 'nullable|string|required_with:unit_price5|max:50|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            'amount5' => 'nullable|string|required_with:unit_price5, quantity5|max:50|regex:/^[0-9]+$/u',
            'note5' => 'nullable|string|max:255|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            //補足のバリデーション
            'hosoku1' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'hosoku2' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
            'hosoku3' => 'nullable|string|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'corp_id.required' => '不具合により、会社のID番号が取得できません。',
            'date.required' => '日付が選択されていません。',
            'tekiyo1.max' => '摘要１の入力欄の最大入力文字数は１００文字までです。',
            'tekiyo1.regex' => '摘要１の入力欄には数字のみの入力や？、！、－、以外の記号を入力することはできません。',
            'unit_price1.required' => '単価１の入力欄は必須です。',
            'unit_price1.max' => '単価１の入力欄の最大入力文字数は５０文字までです。',
            'unit_price1.regex' => '単価１の入力欄には数字のみしか入力できません。',
            'quantity1.required' => '数量１の入力欄は必須です。',
            'quantity1.max' => '数量１の入力欄の最大入力文字数は５０文字までです。',
            'quantity1.regex' => '数量１の入力欄には？、！、―、以外の記号を入力することはできません。',
            'amount1.required' => '金額１の入力欄は必須です。',
            'amount1.max' => '金額１の最大入力文字数は５０文字までです。',
            'amount1.regex' => '金額１の入力欄には数字のみしか入力できません。',
            'note1.max' => '備考１の入力欄の最大文字数は２５５文字までです。',
            'note1.regex' => '備考１の入力欄には、数字のみの入力や？、！、―、以外の記号の入力をすることはできません。',
            //インデックス番号２
            'tekiyo2.max' => '摘要２の入力欄の最大入力文字数は１００文字までです。',
            'tekiyo2.regex' => '摘要２の入力欄には数字のみの入力や？、！、－、以外の記号を入力することはできません。',
            'unit_price2.required_with' => '数量２が入力されている時は、単価２の入力欄は必須です。',
            'uint_price2.max' => '単価２の入力欄の最大入力文字数は５０文字までです。',
            'unit_price2.regex' => '単価２の入力欄には数字のみしか入力できません。',
            'quantity2.required_with' => '単価２が入力されている時は、数量２の入力欄は必須です。',
            'quantity2.max' => '数量２の入力欄の最大入力文字数は５０文字までです。',
            'quantity2.regex' => '数量２の入力欄には？、！、―、以外の記号を入力することはできません。',
            'amount2.required_with' => '単価２もしくは数量２の片方しか入力されていないので、金額２が表示されていません。',
            'amount2.max' => '金額２の最大入力文字数は５０文字までです。',
            'amount2.regex' => '金額２の入力欄には数字のみしか入力できません。',
            //インデックス番号３
            'tekiyo3.max' => '摘要３の入力欄の最大入力文字数は１００文字までです。',
            'tekiyo3.regex' => '摘要３の入力欄には数字のみの入力や？、！、－、以外の記号を入力することはできません。',
            'unit_price3.required_with' => '数量３が入力されている時は、単価３の入力欄は必須です。',
            'uint_price3.max' => '単価３の入力欄の最大入力文字数は５０文字までです。',
            'unit_price3.regex' => '単価３の入力欄には数字のみしか入力できません。',
            'quantity3.required_with' => '単価３が入力されている時は、数量３の入力欄は必須です。',
            'quantity3.max' => '数量３の入力欄の最大入力文字数は５０文字までです。',
            'quantity3.regex' => '数量３の入力欄には？、！、―、以外の記号を入力することはできません。',
            'amount3.required_with' => '単価３もしくは数量３の片方しか入力されていないので、金額３が表示されていません。',
            'amount3.max' => '金額３の最大入力文字数は５０文字までです。',
            'amount3.regex' => '金額３の入力欄には数字のみしか入力できません。',
            //インデックス番号４
            'tekiyo4.max' => '摘要４の入力欄の最大入力文字数は１００文字までです。',
            'tekiyo4.regex' => '摘要４の入力欄には数字のみの入力や？、！、－、以外の記号を入力することはできません。',
            'unit_price4.required_with' => '数量４が入力されている時は、単価４の入力欄は必須です。',
            'uint_price4.max' => '単価４の入力欄の最大入力文字数は５０文字までです。',
            'unit_price4.regex' => '単価４の入力欄には数字のみしか入力できません。',
            'quantity4.required_with' => '単価４が入力されている時は、数量４の入力欄は必須です。',
            'quantity4.max' => '数量４の入力欄の最大入力文字数は５０文字までです。',
            'quantity4.regex' => '数量４の入力欄には？、！、―、以外の記号を入力することはできません。',
            'amount4.required_with' => '単価４もしくは数量４の片方しか入力されていないので、金額４が表示されていません。',
            'amount4.max' => '金額４の最大入力文字数は５０文字までです。',
            'amount4.regex' => '金額４の入力欄には数字のみしか入力できません。',
            //インデックス番号５
            'tekiyo5.max' => '摘要５の入力欄の最大入力文字数は１００文字までです。',
            'tekiyo5.regex' => '摘要５の入力欄には数字のみの入力や？、！、－、以外の記号を入力することはできません。',
            'unit_price5.required_with' => '数量５が入力されている時は、単価５の入力欄は必須です。',
            'uint_price5.max' => '単価５の入力欄の最大入力文字数は５０文字までです。',
            'unit_price5.regex' => '単価５の入力欄には数字のみしか入力できません。',
            'quantity5.required_with' => '単価５が入力されている時は、数量５の入力欄は必須です。',
            'quantity5.max' => '数量５の入力欄の最大入力文字数は５０文字までです。',
            'quantity5.regex' => '数量５の入力欄には？、！、―、以外の記号を入力することはできません。',
            'amount5.required_with' => '単価５もしくは数量５の片方しか入力されていないので、金額５が表示されていません。',
            'amount5.max' => '金額５の最大入力文字数は５０文字までです。',
            'amount5.regex' => '金額５の入力欄には数字のみしか入力できません。',
            //補足のバリデーションメッセージ
            'hosoku1.max' => '補足１の入力欄の最大入力文字数は１００文字までです。',
            'hosoku1.regex' => '補足１の入力欄には？、！、―、以外の記号を入力することはできません。',
            'hosoku2.max' => '補足２の入力欄の最大入力文字数は１００文字までです。',
            'hosoku2.regex' => '補足２の入力欄には？、！、―、以外の記号を入力することはできません。',
            'hosoku3.max' => '補足３の入力欄の最大入力文字数は１００文字までです。',
            'hosoku3.regex' => '補足３の入力欄には？、！、―、以外の記号を入力することはできません。',
        ];
    }
};
