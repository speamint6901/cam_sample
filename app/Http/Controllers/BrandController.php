<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = Brand::with('brand_group')->withCount('gears')
            ->get();

        return response()->json($brands);
    }
}
