<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use App\Http\Requests\CreateBusinessCardRequest;
use App\Models\Corp;

class BusinessCardController extends Controller
{

    public function show(Corp $corp, BusinessCard $businessCard)
    {
        $postalCode = substr($businessCard->corp->postal_code, 0, 3) . '-' . substr($businessCard->corp->postal_code, 3);

        $data = [
            'postalCode' => $postalCode,
            'businessCard' => $businessCard,
            'corp' => $corp,
        ];

        return view('business-card.show', $data);
    }

    public function add(Corp $corp, BusinessCard $businessCard)
    {
        //会社に紐づく名刺の所属部署を変数に格納 ※セレクトボックスで使用する
        $businessCards = $corp->businessCards;
        //divisionの重複を避けた名刺だけを格納
        $uniqueBusinessCards = $businessCards->unique('division');
        $data = [
            'uniqueBusinessCards' => $uniqueBusinessCards,
            'businessCard' => $businessCard,
            'corp' => $corp,
        ];

        return view('business-card.add', $data);
    }

    public function create(CreateBusinessCardRequest $request, Corp $corp)
    {
        $businessCard = new BusinessCard;

        $form = $request->validated();
        $businessCard->fill($form)->save();

        return redirect()->route('corp.businessCardsList', ['corp' => $corp]);
    }

    public function edit(Corp $corp, BusinessCard $businessCard)
    {
        $businessCards = $corp->businessCards;
        $uniqueBusinessCards = $businessCards->unique('division');
        $data = [
            'uniqueBusinessCards' => $uniqueBusinessCards,
            'corp' => $corp,
            'businessCard' => $businessCard,
        ];

        return view('business-card.edit', $data);
    }
}
