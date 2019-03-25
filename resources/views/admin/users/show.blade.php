@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">ユーザー詳細</h3>
      <div class="pull-right">
        <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="{{ route('users.destroy', $user->id) }}">バン</button>
      </div>
    </div>
    <div class="box-body">
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">名前</div>
          <div class="col-md-10">
            {{ $user->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">メールアドレス</div>
          <div class="col-md-10">
            {{ $user->email }}
          </div>
        </div>
    </div>
    <div class="box-footer">
      <a href="{{ route('users.index') }}" class="btn btn-default">戻る</a>
    </div>
  </div>
  <!-- /.box -->
</div>
</div>
@include("admin.components.dialog.delete_confirm")
@endsection
@push('js')
<script>
  $('.delete-button').click(function(e) {
    var route = $(this).data('route');
    $("#delete-form-element").attr("action", route);
  });
</script>
@endpush
