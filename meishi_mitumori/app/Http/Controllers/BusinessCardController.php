<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use App\Http\Requests\CreateBusinessCardRequest;
use App\Models\Corp;

class BusinessCardController extends Controller
{
    public function index(Corp $corp, BusinessCard $businessCard)
    {
        $businessCards = $corp->businessCards;

        //一意の部署名の取得
        $uniqueDivisions = $businessCards->pluck('division')->unique();

        $data = [
            'uniqueDivisions' => $uniqueDivisions,
            'businessCard' => $businessCard,
            'businessCards' => $businessCards,
            'corp' => $corp,
        ];

        return view('business-card.business-cards-list', $data);
    }

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

    public function add(Corp $corp)
    {
        //会社に紐づく名刺の所属部署を変数に格納 ※セレクトボックスで使用する
        $businessCards = $corp->businessCards;
        //divisionの重複を避けた名刺だけを格納 ※divisionの値だけをセレクトボックスで使用したい為
        $uniqueDivisionCards = $businessCards->unique('division');
        $data = [
            'uniqueDivisionCards' => $uniqueDivisionCards,
            'corp' => $corp,
        ];

        return view('business-card.add', $data);
    }

    public function create(CreateBusinessCardRequest $request, Corp $corp)
    {
        $businessCard = new BusinessCard;

        $form = $request->validated();
        $businessCard->fill($form)->save();

        return redirect()->route('business-card.corpBusinessCardsList', ['corp' => $corp]);
    }

    public function edit(Corp $corp, BusinessCard $businessCard)
    {
        $businessCards = $corp->businessCards;
        $uniqueDivisionCards = $businessCards->unique('division');
        $data = [
            'uniqueDivisionCards' => $uniqueDivisionCards,
            'corp' => $corp,
            'businessCard' => $businessCard,
        ];

        return view('business-card.edit', $data);
    }

    public function update(CreateBusinessCardRequest $request, Corp $corp, BusinessCard $businessCard)
    {
        $form = $request->validated();
        $businessCard->fill($form)->save();

        return redirect()->route('business-card.show', ['corp' => $corp, 'businessCard' => $businessCard]);
    }

    public function delete(Corp $corp, BusinessCard $businessCard)
    {
        $businessCard->delete();

        return redirect()->route('business-card.corpBusinessCardsList', ['corp' => $corp, 'businessCard' => $businessCard]);
    }
}
