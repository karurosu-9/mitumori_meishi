<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;
use App\Models\BusinessCard;
use App\Http\Requests\CreateCorpRequest;

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

    public function businessCardsList(Corp $corp, BusinessCard $businessCard)
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

        return view('corp.business-cards-list', $data);
    }

    public function show(Corp $corp)
    {
        $businessCard = $corp->businessCards->first();
        $postalCode = substr($corp->postal_code, 0, 3) . '-' . substr($corp->postal_code, 3);

        $data = [
            'corp' => $corp,
            'businessCard' => $businessCard,
            'postalCode' => $postalCode,
        ];

        return view('corp.show', $data);
    }

    public function add(Corp $corp)
    {
        $data = [
            'corp' => $corp,
        ];

        return view('corp.add', $data);
    }

    public function create(CreateCorpRequest $request)
    {
        $corp = new Corp;
        $form = $request->validated();
        $corp->fill($form)->save();

        return redirect()->route('corp.list');
    }

    public function edit(Corp $corp)
    {
        $data = [
            'corp' => $corp,
        ];

        return view('corp.edit', $data);
    }

    public function delete(Corp $corp)
    {
        $corp->delete();
        return view('corp.index');
    }
}
