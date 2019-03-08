<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGearPost;
use App\Traits\FileUpload;
use App\Models\Gear;
use App\Models\GearProfile;

class GearController extends BaseController
{

    use FileUpload;

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gears.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = Gear::query();
        return datatables()->eloquent($query)
            ->addColumn('brand', function(Gear $gear) {
                return optional($gear->brand)->name;
            })->addColumn('genre', function(Gear $gear) {
                return optional($gear->genre)->name;
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gears.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGearPost $request)
    {
        $params = $request->input();
        \DB::beginTransaction();
        try {
            $params = $this->putFile($request, $params);
            $gear = Gear::create($params);
            GearProfile::create(["gear_id" => $gear->id]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }

        $message = "ギアを登録しました";
        return redirect(route('gears.index'))->with('notice', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['gear'] = Gear::find($id);
        if (is_null($this->data['gear'])) {
            abort(404);
        }
        return view('admin.gears.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['gear'] = Gear::find($id);
        if (is_null($this->data['gear'])) {
            abort(404);
        }
        return view('admin.gears.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGearPost $request, $id)
    {
        $params = $request->input();
        $gear = Gear::find($id);
        if (is_null($gear)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $params = $this->putFile($request, $params);
            $params = collect($params)->filter(function($value, $key) {
                return !is_null($value);
            })->toArray();
            $gear->fill($params)->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ギアを更新しました";
        return redirect(route('gears.index'))->with('notice', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gear = Gear::with('profile')->find($id);
        if (is_null($gear)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $gear->profile()->delete();
            $gear->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ギアを削除しました";
        return redirect(route('gears.index'))->with('notice', $message);
    }
}
