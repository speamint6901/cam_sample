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

    const TOGGLE_TYPE_ACTIVE = "regist";
    const TOGGLE_TYPE_DISABLE = "detach";
    const TOGGLE_TYPE_UPDATE = "update";

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
        \Log::info($params['type']);
        GearStatusHave::dispatch($gear, $user, $params);

        // データ更新以外をカウント変更
        if ($params['type'] != 'update') {
            return $this->toggleHaveCountAndType($params, $user);
        }
        return response()->json([
            "user" => $user, 
            'count' => $params['count'], 
	    ]);
    }

    // 結果表示用カウント更新
    private function toggleCountAndType($params, $user) {
        if ($params['type']) {
            if (!$params['count']) {
                abort(500, 'count augment error');
            }
            $type = 0;
            $count = $params['count'] - 1;
        } else {
            $type = 1;
            $count = $params['count'] + 1;
        }

        return response()->json(["user" => $user, 'count' => $count, 'type' => $type]);
    }

    // 結果表示用カウント更新
    private function toggleHaveCountAndType($params, $user) {

        if ($params['type'] == self::TOGGLE_TYPE_DISABLE) {
            if (!$params['count']) {
                abort(500, 'count augment error');
            }
            $count = $params['count'] - 1;
        } elseif ($params["type"] == self::TOGGLE_TYPE_ACTIVE) {
            $count = $params['count'] + 1;
        } else {
            $count = $params['count'];
        }
        return response()->json([
            "user" => $user, 
            'count' => $count, 
        ]);
    }
}
