<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController
{
    protected Request $request;
    protected array $params;
    protected string $resource;
    protected string $panel;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->params = $request->all();
        $this->panel = env('APP_PANEL');
    }

    public function success($message = '')
    {
        Session::flash('alert-success', $message);
    }

    public function warning($message = '')
    {
        Session::flash('alert-warning', $message);
    }

    public function info($message = '')
    {
        Session::flash('alert-info', $message);
    }

    public function error($message = '')
    {
        Session::flash('alert-error', $message);
    }

}
