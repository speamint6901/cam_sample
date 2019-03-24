<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gear;

class GearController extends Controller
{

    const PER_PAGE = 20;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gears = Gear::with(['brand', 'profile', 'have_users'])->withCount(['have_users', 'want_users', 'fav_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->paginate(self::PER_PAGE);
                   
        return response()->json($gears);
    }

    public function modalGear(Request $request) {
        $params = $request->input();
        $gear = Gear::with(['brand', 'profile', 'have_users'])->withCount(['have_users', 'want_users', 'fav_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->where('id', $params['gear_id'])->first();
        return response()->json(["gear" => $gear]);
    }
}
