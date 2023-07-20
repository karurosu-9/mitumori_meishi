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

        $data = [
            'businessCard' => $businessCard,
            'corp' => $corp,
        ];

        return view('business-card.show', $data);
    }

    public function add(Corp $corp, BusinessCard $businessCard)
    {
        //会社に紐づく名刺の所属部署を変数に格納 ※セレクトボックスで使用する
        $businessCards = $corp->businessCards;
        $distinctDivisionNames = $businessCards->pluck('division')->unique();

        $data = [
            'distinctDivisionNames' => $distinctDivisionNames,
            'businessCard' => $businessCard,
            'corp' => $corp,
        ];

        return view('business-card.add', $data);
    }

    public function create(CreateBusinessCardRequest $request, Corp $corp)
    {
        $businessCard = new BusinessCard;

        $form = $request->validated();
        //var_dump($form);exit;

        $businessCard->fill($form)->save();



        return redirect()->route('corp.businessCardsList', ['corp' => $corp]);
    }
}
