@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">ギア詳細</h3>
      <div class="pull-right">
        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">編集</a>
        <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="{{ route('genres.destroy', $genre->id) }}">削除</button>
      </div>
    </div>
    <div class="box-body">
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">カテゴリ名</div>
          <div class="col-md-10">
            {{ optional($genre->category)->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">名前</div>
          <div class="col-md-10">
            {{ $genre->name }}
          </div>
        </div>
    </div>
    <div class="box-footer">
      <a href="{{ route('genres.index') }}" class="btn btn-default">戻る</a>
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
