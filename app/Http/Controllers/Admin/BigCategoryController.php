<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreBigCategoryPost;
use App\Models\BigCategory;
use App\Imports\BigCategoryImport;

class BigCategoryController extends BaseController
{

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.big_categories.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = BigCategory::query();
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
        return view('admin.big_categories.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBigCategoryPost $request)
    {
        $params = $request->input();
        \DB::beginTransaction();
        try {
            $big_category = BigCategory::create($params);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }

        $message = "大カテゴリを登録しました";
        return redirect(route('big_categories.index'))->with('notice', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['big_category'] = BigCategory::find($id);
        if (is_null($this->data['big_category'])) {
            abort(404);
        }
        return view('admin.big_categories.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['big_category'] = BigCategory::find($id);
        if (is_null($this->data['big_category'])) {
            abort(404);
        }
        return view('admin.big_categories.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBigCategoryPost $request, $id)
    {
        $params = $request->input();
        $big_category = BigCategory::find($id);
        if (is_null($big_category)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $params = collect($params)->filter(function($value, $key) {
                return !is_null($value);
            })->toArray();
            $big_category->fill($params)->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "大カテゴリを更新しました";
        return redirect(route('big_categories.index'))->with('notice', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $big_category = BigCategory::find($id);
        if (is_null($big_category)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $big_category->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "大カテゴリを削除しました";
        return redirect(route('big_categories.index'))->with('notice', $message);
    }

    public function import(Request $request) {
        BigCategory::truncate();
        $file = $request->file('excel_import');
        Excel::import(new BigCategoryImport, $file);
        return redirect(route('big_categories.index'))->with('notice', "大カテゴリをインポートしました");
    }
}
