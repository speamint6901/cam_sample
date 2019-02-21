<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class DashbordController extends BaseController
{
    public function index() {
        return view('admin.index', $this->data);
    }
}
