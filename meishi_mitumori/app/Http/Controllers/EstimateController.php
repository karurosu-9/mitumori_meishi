<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Corp;
use App\Consts\EstimateFormCountConsts;
use App\Http\Requests\CreateEstimateRequest;

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

    public function confirmEstimate(CreateEstimateRequest $request, Corp $corp)
    {
        $formValidatedData = $request->validated();
        $request->session()->put('estimateData', $formValidatedData);

        $data = [
            'formValidatedData' => $formValidatedData,
            'corp' => $corp,
        ];

        var_dump($formValidatedData);
        exit;

        return view('estimate.confirmEstimate', $data);
    }

    public function create(CreateEstimateRequest $request, Corp $corp)
    {
    }
}
