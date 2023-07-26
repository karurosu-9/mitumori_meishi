<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Corp;
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
}
