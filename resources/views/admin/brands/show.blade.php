@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">ブランド詳細</h3>
      <div class="pull-right">
        <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-warning">編集</a>
        <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="{{ route('brands.destroy', $brand->id) }}">削除</button>
      </div>
    </div>
    <div class="box-body">
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">ブランド名</div>
          <div class="col-md-10">
            {{ $brand->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">アルファベットグループ名</div>
          <div class="col-md-10">
            {{ $brand->name_group }}
          </div>
        </div>
    </div>
    <div class="box-footer">
      <a href="{{ route('brands.index') }}" class="btn btn-default">戻る</a>
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
