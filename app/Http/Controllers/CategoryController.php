<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use App\Models\Package;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class CategoryController extends MainController
{
    protected $model;
    public function __construct(Request $request, Category $model)
    {
        $this->resource = 'category';
        $this->model = $model;
        parent::__construct($request);
    }

    public function paginate($categoryId)
    {
        $category = Category::query()->find($categoryId);

        $list = Content::query()
            ->where('category_id', $categoryId)
            ->get();

        $data = [
            'categoryId' => $categoryId,
            'category' => $category,
            'list' => $list,
        ];
        return view('category', $data);
    }

}
