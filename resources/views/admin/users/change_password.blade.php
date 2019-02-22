@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">管理者アカウント登録</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('admin.platform_account.change_password', $admin->id) }}">
      {!! csrf_field() !!}
      @method('PUT')
      <div class="box-body">
        <div class="form-group">
          <label for="password-text" class="col-sm-2 control-label">新しいパスワード</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password-text" value="" placeholder="パスワード">
            <p class="error">{{ $errors->first('password') }}</p>
          </div>
        </div>
        <div class="form-group">
          <label for="password-conf-text" class="col-sm-2 control-label">パスワード再入力</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password_confirmation" id="password-conf-text" value="" placeholder="パスワード再入力">
            <p class="error">{{ $errors->first('password_confirmation') }}</p>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.platform_account.index') }}" class="btn btn-default">キャンセル</a>
        <button type="submit" class="btn btn-info pull-right">変更する</button>
      </div>
      <!-- /.box-footer -->
    </form>
</div>
@endsection
