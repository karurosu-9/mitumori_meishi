<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Corp;
use App\Models\MyCorp;
use App\Http\Requests\CreateEstimateRequest;
use App\Consts\EstimateFormCountConsts;
use Illuminate\Support\Facades\Validator;

class EstimateController extends Controller
{
    public function show(MyCorp $myCorp, Corp $corp, Estimate $estimate)
    {
        $myCorp = $myCorp->first();

        $postalCode = substr($myCorp->postal_code, 0, 3) . '-' . substr($myCorp->postal_code, 3);
        $tel = substr($myCorp->tel, 0, 3) . '-' . substr($myCorp->tel, 3, 3) . '-' . substr($myCorp->tel, 6);
        $fax = substr($myCorp->fax, 0, 3) . '-' . substr($myCorp->fax, 3, 3) . '-' . substr($myCorp->fax, 6);

        $estimateData = $estimate;

        $formattedDate = date('Y年n月j日', strtotime($estimateData['date']));

        $result = $this->processEstimateData($estimateData);
        $tekiyo = $result['tekiyo'];
        $unitPrice = $result['unitPrice'];
        $quantity = $result['quantity'];
        $amount = $result['amount'];
        $note = $result['note'];
        $hosoku = $result['hosoku'];
        $totalPrice = $result['totalPrice'];

        $data = [
            'myCorp' => $myCorp,
            'postalCode' => $postalCode,
            'tel' => $tel,
            'fax' => $fax,
            'formattedDate' => $formattedDate,
            'corp' => $corp,
            'estimate' => $estimate,
            'tekiyo' => $tekiyo,
            'unitPrice' => $unitPrice,
            'quantity' => $quantity,
            'amount' => $amount,
            'note' => $note,
            'hosoku' => $hosoku,
            'totalPrice' => $totalPrice,
        ];

        return view('estimate.show', $data);
    }

    public function add(Corp $corp)
    {
        $data = [
            'corp' => $corp,
            'EstimateFormCountConsts::FORM_NOT_HOSOKU' => EstimateFormCountConsts::FORM_NOT_HOSOKU,
            'EstimateFormCountConsts::FORM_HOSOKU' => EstimateFormCountConsts::FORM_HOSOKU,
        ];

        return view('Estimate.add', $data);
    }

    public function confirmEstimate(CreateEstimateRequest $request, MyCorp $myCorp, Corp $corp)
    {
        //自社の情報を取得
        $myCorp = $myCorp->first();

        //住所電話番号をハイフン有の状態に変換
        $postalCode = substr($myCorp->postal_code, 0, 3) . '-' . substr($myCorp->postal_code, 3);
        $tel = substr($myCorp->tel, 0, 3) . '-' . substr($myCorp->tel, 3, 3) . '-' . substr($myCorp->tel, 6);
        $fax = substr($myCorp->fax, 0, 3) . '-' . substr($myCorp->fax, 3, 3) . '-' . substr($myCorp->fax, 6);

        //バリデーションされた値を格納
        $formValidatedData = $request->validated();

        $formattedDate = date('Y年n月j日', strtotime($formValidatedData['date']));

        //自作関数でforループの処理をし、それぞれの変数に格納
        $result = $this->processEstimateData($formValidatedData);

        $tekiyo = $result['tekiyo'];
        $unitPrice = $result['unitPrice'];
        $quantity = $result['quantity'];
        $amount = $result['amount'];
        $note = $result['note'];
        $hosoku = $result['hosoku'];
        $totalPrice = $result['totalPrice'];

        //フォームの送信データなどをsessionに格納
        $request->session()->put('estimateData', $formValidatedData);

        $data = [
            'formattedDate' => $formattedDate,
            'myCorp' => $myCorp,
            'postalCode' => $postalCode,
            'tel' => $tel,
            'fax' => $fax,
            'tekiyo' => $tekiyo,
            'unitPrice' => $unitPrice,
            'quantity' => $quantity,
            'amount' => $amount,
            'note' => $note,
            'hosoku' => $hosoku,
            'totalPrice' => $totalPrice,
            'corp' => $corp,
        ];

        return view('estimate.confirm-estimate', $data);
    }

    public function create(Request $request, Corp $corp)
    {
        $sessionData = $request->session()->get('estimateData');

        $estimate = new Estimate;

        //関数validateCheckerでセッションデータのバリデーションチェックをする
        $errors = $this->validateChecker($sessionData);

        //バリデーションに引っかかった時の処理
        if ($errors) {
            return redirect()->route('estimate.add')->withErrors($errors)->withInput();
        }

        $estimate->fill($sessionData)->save();
        $request->session()->forget('estimateData');

        return redirect()->route('estimate.show', ['corp' => $corp, 'estimate' => $estimate]);
    }

    public function edit(Corp $corp, Estimate $estimate)
    {
        $result = $this->processEstimateData($estimate);

        $tekiyo = $result['tekiyo'];
        $unitPrice = $result['unitPrice'];
        $quantity = $result['quantity'];
        $amount = $result['amount'];
        $note = $result['note'];
        $hosoku = $result['hosoku'];
        $totalPrice = $result['totalPrice'];

        $data = [
            'corp' => $corp,
            'estimate' => $estimate,
            'EstimateFormCountConsts::FORM_NOT_HOSOKU' => EstimateFormCountConsts::FORM_NOT_HOSOKU,
            'EstimateFormCountConsts::FORM_HOSOKU' => EstimateFormCountConsts::FORM_HOSOKU,
            'tekiyo' => $tekiyo,
            'unitPrice' => $unitPrice,
            'quantity' => $quantity,
            'amount' => $amount,
            'note' => $note,
            'hosoku' => $hosoku,
            'totalPrice' => $totalPrice,
        ];

        return view('estimate.edit', $data);
    }

    //セッションデータのバリデーションをチェックする関数
    private function validateChecker($formValidatedData)
    {
        //フォームリクエストと同じバリデーションの設定
        $rules = [
            'corp_id' => 'required|integer|regex:/^[0-9]+$/u',
            'date' => 'required|date|date_format:Y-m-d',
            //インデックス番号１
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
            //合計金額のバリデーション
            'total_price' => 'required|integer|regex:/^[0-9]+$/u',
        ];

        $validator = Validator::make($formValidatedData, $rules);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        return null;
    }

    private function processEstimateData($validatedData)
    {
        for ($i = 1; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++) {
            $tekiyo[$i] = $validatedData['tekiyo' . $i];
            $unitPrice[$i] = $validatedData['unit_price' . $i];
            $quantity[$i] = $validatedData['quantity' . $i];
            $amount[$i] = $validatedData['amount' . $i];
            $note[$i] = $validatedData['note' . $i];
        }

        for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++) {
            $hosoku[$i] = $validatedData['hosoku' . $i];
        }

        $totalPrice = $validatedData['total_price'];

        return [
            'tekiyo' => $tekiyo,
            'unitPrice' => $unitPrice,
            'quantity' => $quantity,
            'amount' => $amount,
            'note' => $note,
            'hosoku' => $hosoku,
            'totalPrice' => $totalPrice,
        ];
    }
}
