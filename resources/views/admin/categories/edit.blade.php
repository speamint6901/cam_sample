@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">カテゴリ編集</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">大カテゴリ</label>
          <div class="col-sm-10">
            {{ Form::select('big_category_id', \App\Models\BigCategory::selectbox(), $category->big_category_id, ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('big_category_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">カテゴリ名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ $category->name }}" placeholder="カテゴリ名">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('categories.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#edit-confirm" class="btn btn-info pull-right">更新</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.edit_confirm')
    </form>
</div>
@endsection
