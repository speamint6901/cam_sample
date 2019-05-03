<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandGroup;

class BrandController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = BrandGroup::with(['brands' => function($query) {
            $query->withCount('gears');
        }])
        ->get();

        return response()->json($brands);
    }
}
