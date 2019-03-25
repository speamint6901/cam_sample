<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = User::query();
        return datatables()->eloquent($query)->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = User::find($id);
        if (is_null($this->data['user'])) {
            abort(404);
        }
        return view('admin.users.show', $this->data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if (is_null($user)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $user->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ユーザーをバンしました";
        return redirect(route('users.index'))->with('notice', $message);
    }
}
