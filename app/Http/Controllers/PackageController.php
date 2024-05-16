<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends MainController
{

    protected $model;
    public function __construct(Request $request, Package $model)
    {
        $this->resource = 'content';
        $this->model = $model;
        parent::__construct($request);
    }

    public function paginate()
    {
        $data = [
            'list' => $this->model->get(),
        ];
        return view('packages', $data);
    }

    public function detail($id)
    {
        $data = [
            'object' => $this->model->find($id),
        ];
        return view('detail', $data);
    }

}
