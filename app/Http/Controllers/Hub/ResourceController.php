<?php

namespace App\Http\Controllers\Hub;

use App\Http\Controllers\MainController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ResourceController extends MainController
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
        parent::__construct($request);
    }

    public function index()
    {
        $data = array_merge(
            [
                'list' => $this->model->all(),
                'resource' => $this->resource,
            ],
            $this->index_data(),
        );
        return view('panel.' . $this->resource . '.index', $data);
    }

    public function index_data()
    {
        return [];
    }

    public function create()
    {
        $data = array_merge(
            [
                'resource' => $this->resource,
            ],
            $this->create_data(),
            $this->resource_data(),
        );
        return view('panel.' . $this->resource . '.detail', $data);
    }

    public function create_data()
    {
        return [];
    }

    public function store()
    {
        $this->model->create($this->params);
        $this->success('با موفقیت ثبت شد');
        return redirect(route($this->panel . '.' . $this->resource . '.index'));
    }

    public function show($id)
    {
        return view();
    }

    public function edit($id)
    {
        $data = array_merge(
            [
                'resource' => $this->resource,
                'object' => $this->model->find($id),
            ],
            $this->edit_data(),
            $this->resource_data(),
        );
        return view('panel.' . $this->resource . '.detail', $data);
    }

    public function edit_data()
    {
        return [];
    }

    public function update($id)
    {
        $object = $this->model->find($id);
        $object->update($this->params);
        $this->success('با موفقیت ثبت شد');
        return redirect(route($this->panel . '.' . $this->resource . '.index'));
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        $this->success('داده مورد نظر حذف گردید.');
        return redirect()->back();
    }

    public function resource_data()
    {
        return [];
    }

}
