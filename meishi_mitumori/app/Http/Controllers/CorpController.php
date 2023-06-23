<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corp;
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

    public function show(Corp $corp)
    {
        $postalCode = substr($corp->postal_code, 0, 3) . '-' . substr($corp->postal_code, 3);

        $data = [
            'corp' => $corp,
            'postalCode' => $postalCode,
        ];

        return view('corp.show', $data);
    }

    public function add()
    {
        return view('corp.add');
    }

    public function create(CreateCorpRequest $request)
    {
        $corp = new Corp;
        $form = $request->validated();
        $corp->fill($form)->save();

        return redirect()->route('corp.show');
    }

    public function edit(Corp $corp)
    {
        $data = [
            'corp' => $corp,
        ];

        return view('corp.edit', $data);
    }
}
