<?php

namespace App\Http\Controllers\Hub;

use App\Models\Package;

class TagController extends MainController
{

    public function index()
    {
        $data = [
            'packages' => Package::all(),
        ];
        return view('hub.index', $data);
    }

}
