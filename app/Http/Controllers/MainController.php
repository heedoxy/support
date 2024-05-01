<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MainController
{
    protected Request $request;
    protected Model $model;
    protected array $params;
    protected string $resource;

    public function __construct(Request $request, Model $model)
    {
        $this->request = $request;
        $this->params = $request->all();
        $this->model = $model;
    }

    public function index()
    {
        dd('index');
    }

    public function create()
    {
        dd('create');
    }

    public function store()
    {
        $object = $this->model->create($this->params);
        return redirect(route($this->resource . '.show', $object->id));
    }

    public function show($id)
    {
        return view();
    }

    public function edit($id)
    {

    }

    public function update($id)
    {
        $object = $this->model->find($id);
        $object->update($this->params);
            return redirect(route($this->resource . '.show', $id));
    }

    public function destroy()
    {
    }

}
