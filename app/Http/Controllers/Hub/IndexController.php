<?php

namespace App\Http\Controllers\Hub;

use App\Http\Controllers\MainController;
use App\Models\Package;

class IndexController extends MainController
{

    public function index()
    {
        $data = [
            'packages' => Package::all(),
        ];
        return view('panel.index', $data);
    }

}
