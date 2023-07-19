<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use App\Https\Requests\CreateBusinessCardRequest;
use App\Models\Corp;

class BusinessCardController extends Controller
{
    public function add(Corp $corp)
    {
        $businessCards = $corp->businessCards;

        $data = [
            'businessCards' => $businessCards,
            'corp' => $corp,
        ];

        return view('business-card.add', $data);
    }

    public function create(CreateBusinessCardRequest $request)
    {
    }
}
