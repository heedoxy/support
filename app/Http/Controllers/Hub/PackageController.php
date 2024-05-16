<?php

namespace App\Http\Controllers\Hub;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends ResourceController
{
    public function __construct(Request $request, Package $model)
    {
        $this->resource = 'package';
        parent::__construct($request, $model);
    }

    public function getCategory()
    {
        $packageId = $this->params['packageId'];
        return Category::query()->where('package_id', $packageId)->get();
    }

}
