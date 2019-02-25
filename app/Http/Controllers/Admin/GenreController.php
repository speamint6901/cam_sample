<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreGenrePost;
use App\Models\Genre;

class GenreController extends BaseController
{

    const ITEM_PER_PAGE = 20;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.genres.index', $this->data);
    }

    public function dataIndex(Request $request) {
        $query = Genre::query();
        return datatables()->eloquent($query)
            ->addColumn('category', function(Genre $genre) {
                return optional($genre->category)->name;
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
        return view('admin.genres.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenrePost $request)
    {
        $params = $request->input();
        \DB::beginTransaction();
        try {
            $genre = Genre::create($params);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
            //abort(500);
        }

        $message = "ジャンルを登録しました";
        return redirect(route('genres.index'))->with('notice', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['genre'] = Genre::find($id);
        if (is_null($this->data['genre'])) {
            abort(404);
        }
        return view('admin.genres.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['genre'] = Genre::find($id);
        if (is_null($this->data['genre'])) {
            abort(404);
        }
        return view('admin.genres.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGenrePost $request, $id)
    {
        $params = $request->input();
        $genre = Genre::find($id);
        if (is_null($genre)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $params = collect($params)->filter(function($value, $key) {
                return !is_null($value);
            })->toArray();
            $genre->fill($params)->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ジャンルを更新しました";
        return redirect(route('genres.index'))->with('notice', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (is_null($genre)) {
            abort(404);
        }

        \DB::beginTransaction();
        try {
            $genre->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            abort(500);
        }

        $message = "ジャンルを削除しました";
        return redirect(route('genres.index'))->with('notice', $message);
    }
}
