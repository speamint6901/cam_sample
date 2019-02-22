@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">アカウント登録</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('admin.platform_account.create') }}">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">名前</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ old('name') }}" placeholder="名前">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="email-text" class="col-sm-2 control-label">メールアドレス</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email-text" value="{{ old('email') }}" placeholder="メールアドレス">
            <p class="text-danger"><strong>{{ $errors->first('email') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="password-text" class="col-sm-2 control-label">パスワード</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password-text" value="" placeholder="パスワード">
            <p class="text-danger"><strong>{{ $errors->first('password') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="password-conf-text" class="col-sm-2 control-label">パスワード再入力</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password_confirmation" id="password-conf-text" value="" placeholder="パスワード再入力">
            <p class="text-danger"><strong>{{ $errors->first('password_confirmation') }}</strong></p>
          </div>
        </div>
        @include("admin.platform_account.{$auth_user->getRoleNames()[0]}.create")
        <div class="form-group">
          <label class="col-sm-2 control-label">操作権限</label>
          @foreach (\App\Models\Permission::CheckBox($auth_user->role_id, $auth_user->role_name) as $permission)
            <div class="col-md-2">
              <label for="permission-checkbox-{{$permission->id}}">
              <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="permission-checkbox-{{$permission->id}}"><span style="padding-left:2px;">{{ $permission->disp_name }}</span>
              </label>
            </div>
          @endforeach
          <p class="text-danger"><strong>{{ $errors->first('permission') }}</strong></p>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.platform_account.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#register-confirm" class="btn btn-info pull-right">登録</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.register_confirm')
    </form>
</div>
@endsection
