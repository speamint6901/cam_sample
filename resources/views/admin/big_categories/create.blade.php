@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">大カテゴリ新規登録</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('big_categories.store') }}">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">名前</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ old('name') }}" placeholder="名前">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('big_categories.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#register-confirm" class="btn btn-info pull-right">登録</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.register_confirm')
    </form>
</div>
@endsection
