<?php

namespace App\Http\Controllers\Hub;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class CategoryController extends ResourceController
{

    public function __construct(Request $request, Category $model)
    {
        $this->resource = 'category';
        parent::__construct($request, $model);
    }

    public function resource_data()
    {
        return [
          'packages' => Package::all(),
        ];
    }

}
