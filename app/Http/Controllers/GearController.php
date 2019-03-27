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

    public function show(Request $request) {
        $params = $request->input();
        $gear = Gear::with(['brand', 'profile', 'genre.category.big_category', 'category.big_category', 'have_users' => function($query) use ($params)  { 
            $query->where('gear_id', $params["id"]);
        }, 'want_users' => function($query) { 
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }, 'fav_users' => function($query) { 
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->withCount(['have_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }, 'want_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }, 'fav_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->where('id', $params['id'])->first();

        $gear_comment_count = $gear->have_users()->whereNotNull('have_comment')->count();

        return response()->json(["gear" => $gear, 'comment_count' => $gear_comment_count]);
    }

    public function comments(Request $request) {
        $params = $request->input();
        $comments = \App\Models\GearUser::where('gear_id', $params['gear_id'])
                                       ->whereNotNull('have_comment')
                                       ->paginate(self::PER_PAGE);
        return response()->json($comments);
    }

    public function modalGear(Request $request) {
        $params = $request->input();
        $gear = Gear::with(['brand', 'profile', 'have_users' => function($query) { 
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->withCount(['have_users' => function($query) {
            $query->where('user_id', optional(\Auth::guard('api')->user())->id);
        }])->where('id', $params['gear_id'])->first();
        return response()->json(["gear" => $gear]);
    }
}
