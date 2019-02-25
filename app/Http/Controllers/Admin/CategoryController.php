<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryPost;
use App\Models\Category;

class CategoryController extends BaseController
{

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = Category::query();
        return datatables()->eloquent($query)
            ->addColumn('big_category', function(Category $category) {
                return optional($category->big_category)->name;
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
        return view('admin.categories.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryPost $request)
    {
        $params = $request->input();
        \DB::beginTransaction();
        try {
            $category = Category::create($params);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }

        $message = "カテゴリを登録しました";
        return redirect(route('categories.index'))->with('notice', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['category'] = Category::find($id);
        if (is_null($this->data['category'])) {
            abort(404);
        }
        return view('admin.categories.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Category::find($id);
        if (is_null($this->data['category'])) {
            abort(404);
        }
        return view('admin.categories.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryPost $request, $id)
    {
        $params = $request->input();
        $category = Category::find($id);
        if (is_null($category)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $params = collect($params)->filter(function($value, $key) {
                return !is_null($value);
            })->toArray();
            $category->fill($params)->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "カテゴリを更新しました";
        return redirect(route('categories.index'))->with('notice', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (is_null($category)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $category->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "カテゴリを削除しました";
        return redirect(route('categories.index'))->with('notice', $message);
    }
}
