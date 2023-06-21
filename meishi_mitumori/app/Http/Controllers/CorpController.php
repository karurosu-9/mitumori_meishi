<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;

class CorpController extends Controller
{
    public function index()
    {
        $corps = Corp::all();

        $data = [
            'corps' => $corps,
        ];

        return view('corp.index', $data);
    }
}
