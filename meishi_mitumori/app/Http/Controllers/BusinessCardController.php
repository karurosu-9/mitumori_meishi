<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use App\Http\Requests\CreateBusinessCardRequest;
use App\Models\Corp;

class BusinessCardController extends Controller
{
    public function add(Corp $corp)
    {
        //会社に紐づく名刺を変数に格納
        $businessCards = $corp->businessCards;

        $data = [
            'businessCards' => $businessCards,
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
