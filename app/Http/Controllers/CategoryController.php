<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BigCategory;

class CategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = BigCategory::with(['categories'])->withCount(['categories'])
            ->get();

        return response()->json($category);
    }
}
