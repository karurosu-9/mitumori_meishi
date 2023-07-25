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
            'tekiyo1' => 'nullable|max:100|regex:/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠])[a-zA-Zぁ-んァ-ヶ一-龠\-]+$/u',
            'unit_price1' => 'required|max:50|regex/^[0-9]+$/u',
            'quantity1' => 'required|max:50|regex/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠?!\-]+$/u',
            'amount1' => 'required|max:50|regex/^[0-9]+$/u',
            'note1' => 'nullable|max:255|regex/^(?=.*[a-zA-Zぁ-んァ-ヶ一-龠?!\-])[a-zA-Zぁ-んァ-ヶ一-龠0-9?!\-]+$/u',
        ];
    }
};
