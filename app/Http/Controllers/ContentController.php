<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends MainController
{
    protected $model;

    public function __construct(Request $request, Content $model)
    {
        $this->resource = 'content';
        $this->model = $model;
        parent::__construct($request);
    }

    public function show($id)
    {
        $data = [
            'object' => $this->model->find($id),
        ];
        return view('guide', $data);
    }

}
