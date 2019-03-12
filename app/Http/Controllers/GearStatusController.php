<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gear;

class GearStatusController extends Controller
{
    public function toggleWant(Request $request) {
        $params = ["gear_id" => 1];
        $user = \Auth::user();
        return response()->json(["user" => $user, 'want_count' => 1]);
    }
}
