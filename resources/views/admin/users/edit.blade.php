@extends('admin.layouts.admin')

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">アカウント編集</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="{{ route('admin.platform_account.update', $admin->id) }}">
      {!! csrf_field() !!}
      @method('PUT')
      <input type="hidden" name="company_id" value="{{ $admin->company_id }}">
      <div class="box-body">
        <div class="form-group">
          <label for="name-text" class="col-sm-2 control-label">名前</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name-text" value="{{ $admin->name }}" placeholder="名前">
            <p class="text-danger"><strong>{{ $errors->first('name') }}</strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="email-text" class="col-sm-2 control-label">メールアドレス</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email-text" value="{{ $admin->email }}" placeholder="メールアドレス">
            <p class="text-danger"><strong>{{ $errors->first('email') }}</strong></p>
          </div>
        </div>
        @if ($admin->role_name == $admin::ROLE_PROPRIETARY)
        @role('super|proprietary')
        <div class="form-group">
          <label for="company-select" class="col-sm-2 control-label">社員区分</label>
          <div class="col-sm-10">
            {{ Form::select('account_type', \App\Models\PlatformAccount::selectBox(), $admin->account_type) }}
          </div>
        </div>
        <div class="form-group">
          <label for="company-select" class="col-sm-2 control-label">支店選択</label>
          <div class="col-sm-10">
            <input type="hidden" name="company_id" value="{{ $auth_user->company_id }}">
            {{ Form::select('company_branch_id', \App\Models\CompanyBranch::SelectBox($admin->company_id), $admin->company_branch_id) }}
            <p class="text-danger"><strong>{{ $errors->first('company_branch_id') }}</strong></p>
          </div>
        </div>
        @endrole
        @endif
        <div class="form-group">
          <label for="permission-checkbox" class="col-sm-2 control-label">操作権限</label>
          @foreach (\App\Models\Permission::CheckBox($admin->role_id, $admin->role_name) as $permission)
            <div class="col-sm-2">
              @if ($admin->getDirectPermissions()->whereIn('name', $permission->name)->first())
              <label for="permission-checkbox-{{$permission->id}}">
                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="permission-checkbox-{{$permission->id}}" checked="checked"><span style="padding-left:2px;">{{ $permission->disp_name }}</span>
              </label>
              @else
              <label for="permission-checkbox-{{$permission->id}}">
                <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="permission-checkbox-{{$permission->id}}"><span style="padding-left:2px;">{{ $permission->disp_name }}</span>
              </label>
              @endif
            </div>
          @endforeach
          <p class="text-danger"><strong>{{ $errors->first('permission') }}</strong></p>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ route('admin.platform_account.index') }}" class="btn btn-default">キャンセル</a>
        <button type="button" data-toggle="modal" data-target="#edit-confirm" class="btn btn-info pull-right">更新</button>
      </div>
      <!-- /.box-footer -->
      @include('admin.components.dialog.edit_confirm')
    </form>
</div>
@endsection
