<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Corp;
use App\Models\MyCorp;
use App\Http\Requests\CreateEstimateRequest;
use App\Consts\EstimateFormCountConsts;

class EstimateController extends Controller
{
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
        $formValidatedData = $request->validated();

        $formattedDate = date('Y年n月j日', strtotime($formValidatedData['date']));

        //var_dump($formValidatedData);
        //exit;

        //自社の情報を取得
        $myCorp = $myCorp->first();

        //住所電話番号をハイフン有の状態に変換
        $postalCode = substr($myCorp->postal_code, 0, 3) . '-' . substr($myCorp->postal_code, 3);
        $tel = substr($myCorp->tel, 0, 3) . '-' . substr($myCorp->tel, 3, 3) . '-' . substr($myCorp->tel, 6);
        $fax = substr($myCorp->fax, 0, 3) . '-' . substr($myCorp->fax, 3, 3) . '-' . substr($myCorp->fax, 6);

        //合計金額の初期化
        $totalPrice = 0;

        for ($i = 1; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++) {
            $sessionDataTekiyo[$i] = $formValidatedData['tekiyo' . $i];
            $sessionDataUnitPrice[$i] = $formValidatedData['unit_price' . $i];
            $sessionDataQuantity[$i] = $formValidatedData['quantity' . $i];
            $sessionDataAmount[$i] = $formValidatedData['amount' . $i];
            $sessionDataNote[$i] = $formValidatedData['note' . $i];
            $totalPrice += $formValidatedData['amount' . $i];
        }

        for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++) {
            $sessionDataHosoku[$i] = $formValidatedData['hosoku' . $i];
        }

        //total_priceを格納
        $formValidatedData['total_price'] = $totalPrice;

        //フォームの送信データなどをsessionに格納
        $request->session()->put('estimateData', $formValidatedData);

        $data = [
            'formattedDate' => $formattedDate,
            'myCorp' => $myCorp,
            'postalCode' => $postalCode,
            'tel' => $tel,
            'fax' => $fax,
            'sessionDataTekiyo' => $sessionDataTekiyo,
            'sessionDataUnitPrice' => $sessionDataUnitPrice,
            'sessionDataQuantity' => $sessionDataQuantity,
            'sessionDataAmount' => $sessionDataAmount,
            'sessionDataNote' => $sessionDataNote,
            'sessionDataHosoku' => $sessionDataHosoku,
            'totalPrice' => $totalPrice,
            'corp' => $corp,
        ];

        return view('estimate.confirm-estimate', $data);
    }

    public function RegisterData(Corp $corp)
    {
    }
}
