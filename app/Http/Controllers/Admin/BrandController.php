<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreBrandPost;
use App\Models\Brand;
use App\Models\BrandGroup;
use App\Imports\BrandImport;
use App\Imports\BrandGroupImport;

class BrandController extends BaseController
{

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = Brand::query();
        return datatables()->eloquent($query)
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandPost $request)
    {
        $params = $request->input();
        \DB::beginTransaction();
        try {
            $brand = Brand::create($params);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }

        $message = "ブランドを登録しました";
        return redirect(route('brands.index'))->with('notice', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['brand'] = Brand::find($id);
        if (is_null($this->data['brand'])) {
            abort(404);
        }
        return view('admin.brands.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['brand'] = Brand::find($id);
        if (is_null($this->data['brand'])) {
            abort(404);
        }
        return view('admin.brands.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandPost $request, $id)
    {
        $params = $request->input();
        $brand = Brand::find($id);
        if (is_null($brand)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $params = collect($params)->filter(function($value, $key) {
                return !is_null($value);
            })->toArray();
            $brand->fill($params)->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ブランドを更新しました";
        return redirect(route('brands.index'))->with('notice', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (is_null($brand)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $brand->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ブランドを削除しました";
        return redirect(route('brands.index'))->with('notice', $message);
    }

    public function import(Request $request) {
        Brand::truncate();
        $file = $request->file('excel_import');
        Excel::import(new BrandImport, $file);
        return redirect(route('brands.index'))->with('notice', "ブランドをインポートしました");
    }

    public function importGroups(Request $request) {
        BrandGroup::truncate();
        $file = $request->file('excel_import_groups');
        Excel::import(new BrandGroupImport, $file);
        return redirect(route('brands.index'))->with('notice', "ブランドグループをインポートしました");
    }
}
