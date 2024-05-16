<?php

namespace App\Http\Controllers\Hub;

use App\Models\Content;
use App\Models\Package;
use Illuminate\Http\Request;

class ContentController extends ResourceController
{

    public function __construct(Request $request, Content $model)
    {
        $this->resource = 'content';
        parent::__construct($request, $model);
    }

    public function resource_data()
    {
        return [
            'package' => Package::all(),
        ];
    }

}
