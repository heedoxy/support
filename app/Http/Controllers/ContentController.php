<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends MainController
{

    public function __construct(Request $request, Content $model)
    {
        $this->resource = 'content';
        parent::__construct($request, $model);
    }

    public function create()
    {
        return view('content');
    }

    public function edit($id)
    {
        $data = [
            'object' => $this->model->find($id),
        ];
        return view('content', $data);
    }

    public function show($id)
    {
        $data = [
            'object' => $this->model->find($id),
        ];
        return view('guide', $data);
    }

}
