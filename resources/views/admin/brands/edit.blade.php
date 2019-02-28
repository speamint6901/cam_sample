@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">ブランド編集</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('brands.update', $brand->id) }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ブランド名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ $brand->name }}" placeholder="ブランド名">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name_katakana-text" class="col-sm-2 control-label">ブランド名(カナ)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_katakana" id="name_katakana-text" value="{{ $brand->name_katakana }}" placeholder="ブランド名(カナ)">
            <p class="text-danger"><strong>{{ $errors->first('name_katakana') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="body-text" class="col-sm-2 control-label">アルファベットグループ</label>
          <div class="col-sm-10">
            <select name="name_category">
            @foreach (\App\Models\Brand::alphaSelectbox() as $value)
               @if ($brand->name_category == $value)
               <option value="{{ $value }}" selected="selected">{{ $value }}</option> 
               @else
               <option value="{{ $value }}">{{ $value }}</option> 
               @endif
            @endforeach
            </select>
            <p class="text-danger"><strong>{{ $errors->first('name_category') }}</strong></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('brands.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#edit-confirm" class="btn btn-info pull-right">更新</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.edit_confirm')
    </form>
</div>
@endsection
