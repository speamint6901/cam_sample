@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">ギア編集</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('gears.update', $gear->id) }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ブランド</label>
          <div class="col-sm-10">
            {{ Form::select('brand_id', \App\Models\Brand::selectbox(), $gear->brand_id, ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('brand_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">カテゴリ</label>
          <div class="col-sm-10">
            {{ Form::select('category_id', \App\Models\Category::selectbox(), isset($gear->category[0]) ? $gear->category[0]->id : null, ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('category_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ジャンル</label>
          <div class="col-sm-10">
            {{ Form::select('genre_id', \App\Models\Genre::selectbox(), $gear->genre_id, ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('genre_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">タイトル</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ $gear->name }}" placeholder="ギア名">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="discription-text" class="col-sm-2 control-label">説明文</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="discription" rows="10" id="discription-text">{{ $gear->discription }}</textarea>
            <p class="text-danger"><strong>{{ $errors->first('discription') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="gear_image-text" class="col-sm-2 control-label">ギア画像</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gear_image" id="gear_image-text" value="{{ $gear->gear_image }}">
            <img src="{{ asset('storage/'.$gear->gear_image) }}" style="width: 300px;">
            <p class="text-danger"><strong>{{ $errors->first('gear_image') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="site_url-text" class="col-sm-2 control-label">サイトURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="site_url" id="site_url-text" value="{{ $gear->site_url }}" placeholder="サイトURL">
            <p class="text-danger"><strong>{{ $errors->first('site_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="amazon_url-text" class="col-sm-2 control-label">アマゾンURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="amazon_url" id="amazon_url-text" value="{{ $gear->amazon_url }}" placeholder="アマゾンURL">
            <p class="text-danger"><strong>{{ $errors->first('amazon_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="amazon_url-text" class="col-sm-2 control-label">アマゾンimg</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="amazon_img" id="amazon_img-text" value="{{ $gear->amazon_img }}" placeholder="アマゾンimg">
            <p class="text-danger"><strong>{{ $errors->first('amazon_img') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="yahoo_url-text" class="col-sm-2 control-label">ヤフーURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="yahoo_url" id="yahoo_url-text" value="{{ $gear->yahoo_url }}" placeholder="ヤフーURL">
            <p class="text-danger"><strong>{{ $errors->first('yahoo_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="yahoo_img-text" class="col-sm-2 control-label">ヤフーimg</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="yahoo_img" id="yahoo_img-text" value="{{ $gear->yahoo_img }}" placeholder="ヤフーimg">
            <p class="text-danger"><strong>{{ $errors->first('yahoo_img') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="rakuten_url-text" class="col-sm-2 control-label">楽天URL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="rakuten_url" id="rakuten_url-text" value="{{ $gear->rakuten_url }}" placeholder="楽天URL">
            <p class="text-danger"><strong>{{ $errors->first('rakuten_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="rakuten_img-text" class="col-sm-2 control-label">楽天img</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="rakuten_img" id="rakuten_img-text" value="{{ $gear->rakuten_img }}" placeholder="楽天img">
            <p class="text-danger"><strong>{{ $errors->first('rakuten_img') }}</strong></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('gears.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#edit-confirm" class="btn btn-info pull-right">更新</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.edit_confirm')
    </form>
</div>
@endsection
