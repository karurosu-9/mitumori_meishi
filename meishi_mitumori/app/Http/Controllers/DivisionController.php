<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Corp;

class DivisionController extends Controller
{
    public function add(Corp $corp)
    {
        $corps = Corp::all();
        $data = [
            'corps' => $corps,
            'corp' => $corp,
        ];

        return view('division.add', $data);
    }
}
