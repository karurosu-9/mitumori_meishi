<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use App\Https\Requests\CreateBusinessCardRequest;

class BusinessCardController extends Controller
{
    public function add()
    {
        $corps = Corp::all();



        $data = [
            'corps' => $corps,
        ];

        return view('business_card.add', $data);
    }

    public function create()
    {

    }
}
