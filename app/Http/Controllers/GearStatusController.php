<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGearStatusPost;
use App\Jobs\GearStatusWant;
use App\Models\Gear;

class GearStatusController extends Controller
{

    const TOGGLE_TYPE_ACTIVE = 1;
    const TOGGLE_TYPE_DISABLE = 0;

    public function toggleWant(/*StoreGearStatusPost*/Request $request) {

        $params = $request->input();
        $user = \Auth::user();
        $gear = Gear::find($params['gear_id']);
        if (is_null($gear)) {
            abort(404);
        }

        // ジョブに投入
        GearStatusWant::dispatch($gear, $user, $params['type']);

        if ($params['type']) {
            if (!$params['count']) {
                abort(500);
            }
            $type = self::TOGGLE_TYPE_DISABLE;
            $count = $params['count'] - 1;
        } else {
            $type = self::TOGGLE_TYPE_ACTIVE;
            $count = $params['count'] + 1;
        }
        return response()->json(["user" => $user, 'want_count' => $count, 'type' => $type]);
    }
}
