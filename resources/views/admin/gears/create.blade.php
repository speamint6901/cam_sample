@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">ギア新規登録</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('gears.store') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ブランド</label>
          <div class="col-sm-10">
            {{ Form::select('brand_id', \App\Models\Brand::selectbox(), old('brand_id'), ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('brand_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">カテゴリ</label>
          <div class="col-sm-10">
            {{ Form::select('category_id', \App\Models\Category::selectbox(), old('category_id'), ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('category_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ジャンル</label>
          <div class="col-sm-10">
            {{ Form::select('genre_id', \App\Models\Genre::selectbox(), old('genre_id'), ['class' => 'form-control', 'id' => 'categories_type']) }}
            <p class="text-danger"><strong>{{ $errors->first('genre_id') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">ギア名</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ old('name') }}" placeholder="ギア名">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="body-text" class="col-sm-2 control-label">説明文</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="discription">{{ old('discription') }}</textarea>
            <p class="text-danger"><strong>{{ $errors->first('discription') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="gear_image-text" class="col-sm-2 control-label">ギア画像</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="gear_image" id="gear_image-text" value="{{ old('gear_image') }}">
            <p class="text-danger"><strong>{{ $errors->first('gear_image') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="site_url-text" class="col-sm-2 control-label">サイトURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="site_url" id="site_url-text" value="{{ old('site_url') }}" placeholder="サイトURL">
            <p class="text-danger"><strong>{{ $errors->first('site_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="amazon_url-text" class="col-sm-2 control-label">アマゾンURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="amazon_url" id="amazon_url-text" value="{{ old('amazon_url') }}" placeholder="アマゾンURL">
            <p class="text-danger"><strong>{{ $errors->first('amazon_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="amazon_url-text" class="col-sm-2 control-label">アマゾンimg</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="amazon_img" id="amazon_img-text" value="{{ old('amazon_img') }}" placeholder="アマゾンimg">
            <p class="text-danger"><strong>{{ $errors->first('amazon_img') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="yahoo_url-text" class="col-sm-2 control-label">ヤフーURL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="yahoo_url" id="yahoo_url-text" value="{{ old('yahoo_url') }}" placeholder="ヤフーURL">
            <p class="text-danger"><strong>{{ $errors->first('yahoo_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="yahoo_img-text" class="col-sm-2 control-label">ヤフーimg</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="yahoo_img" id="yahoo_img-text" value="{{ old('yahoo_img') }}" placeholder="ヤフーimg">
            <p class="text-danger"><strong>{{ $errors->first('yahoo_img') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="rakuten_url-text" class="col-sm-2 control-label">楽天URL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="rakuten_url" id="rakuten_url-text" value="{{ old('rakuten_url') }}" placeholder="楽天URL">
            <p class="text-danger"><strong>{{ $errors->first('rakuten_url') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="rakuten_img-text" class="col-sm-2 control-label">楽天img</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="rakuten_img" id="rakuten_img-text" value="{{ old('rakuten_img') }}" placeholder="楽天img">
            <p class="text-danger"><strong>{{ $errors->first('rakuten_img') }}</strong></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('gears.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#register-confirm" class="btn btn-info pull-right">登録</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.register_confirm')
    </form>
</div>
@endsection
