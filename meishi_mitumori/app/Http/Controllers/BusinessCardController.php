<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;

class BusinessCardController extends Controller
{
    public function add()
    {
       return view('business_card.add');
    }
}
