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
        $category = BigCategory::with(['categories' => function($query) {
            $query->withCount('gear');    
        }, 'categories.genres' => function($query) {
            $query->withCount('gears');    
        }])
        ->get()
        ->map(function($item, $key) {
            // それぞれのルートからbigカテゴリのギアカウントを取る
            $category_root_count = $item->categories->sum('gear_count');  
            $genre_root_count = $item->categories->map(function($item, $key) {
                return $item->genres->sum('gears_count');
            })->sum();
            $item->gears_count = $category_root_count + $genre_root_count;
            return $item;
        });

        return response()->json($category);
    }
}
