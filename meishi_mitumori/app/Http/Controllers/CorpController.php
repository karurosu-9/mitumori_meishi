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

    public function create()
    {
        var_dump($_POST);exit;
    }
}
