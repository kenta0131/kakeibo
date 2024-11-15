<?php

namespace App\Http\Controllers;

use App\Models\createModel;
use Illuminate\Http\Request;

class createController
{
    public function index()
    {
        return view('create');
    }

    public function create(Request $request)
    {
        $createModel = new createModel();
        $createModel->create($request);
        return redirect()->action([createController::class, 'index']);
    }
}