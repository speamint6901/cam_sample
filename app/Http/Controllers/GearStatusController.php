<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGearStatusPost;
use App\Http\Requests\StoreGearStatusHavePost;
use App\Jobs\GearStatusWant;
use App\Jobs\GearStatusFav;
use App\Jobs\GearStatusHave;
use App\Models\Gear;

class GearStatusController extends Controller
{

    const TOGGLE_TYPE_ACTIVE = 1;
    const TOGGLE_TYPE_DISABLE = 0;

    // want toggle
    public function toggleWant(StoreGearStatusPost $request) {

        $params = $request->input();
        $user = \Auth::user();
        $gear = Gear::find($params['gear_id']);
        if (is_null($gear)) {
            abort(404);
        }

        // ジョブに投入
        GearStatusWant::dispatch($gear, $user, $params['type']);

        return $this->toggleCountAndType($params, $user);
    }

    // fav toggle
    public function toggleFav(StoreGearStatusPost $request) {

        $params = $request->input();
        $user = \Auth::user();
        $gear = Gear::find($params['gear_id']);
        if (is_null($gear)) {
            abort(404);
        }

        // ジョブに投入
        GearStatusFav::dispatch($gear, $user, $params['type']);

        return $this->toggleCountAndType($params, $user);
    }

    public function toggleHave(StoreGearStatusHavePost $request) {
        $params = $request->input();
        $user = \Auth::user();
        $gear = Gear::find($params['gear_id']);
        if (is_null($gear)) {
            abort(404);
        }
        // ジョブに投入
        GearStatusHave::dispatch($gear, $user, $params);

        if (!$params['type'] && !$gear->have_users()->count()) {
            return $this->toggleCountAndType($params, $user);
        }
        return response()->json(["user" => $user, 'count' => $params['count'], 'type' => $params['type']]);
    }

    private function toggleCountAndType($params, $user) {

        if ($params['type']) {
            if (!$params['count']) {
                abort(500, 'count augment error');
            }
            $type = self::TOGGLE_TYPE_DISABLE;
            $count = $params['count'] - 1;
        } else {
            $type = self::TOGGLE_TYPE_ACTIVE;
            $count = $params['count'] + 1;
        }
        return response()->json(["user" => $user, 'count' => $count, 'type' => $type]);
    }
}
