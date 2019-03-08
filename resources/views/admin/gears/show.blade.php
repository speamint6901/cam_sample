@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">ギア詳細</h3>
      <div class="pull-right">
        <a href="{{ route('gears.edit', $gear->id) }}" class="btn btn-warning">編集</a>
        <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="{{ route('gears.destroy', $gear->id) }}">削除</button>
      </div>
    </div>
    <div class="box-body">
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">ブランド</div>
          <div class="col-md-10">
            {{ optional($gear->brand)->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">カテゴリ</div>
          <div class="col-md-10">
            {{ isset($gear->category[0]) ? $gear->category[0]->name : null }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">ジャンル</div>
          <div class="col-md-10">
            {{ optional($gear->genre)->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">名前</div>
          <div class="col-md-10">
            {{ $gear->name }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">説明文</div>
          <div class="col-md-10">
            {{ $gear->discription }}
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">ギア画像</div>
          <div class="col-md-10">
            <img src="{{ asset('storage/'. $gear->gear_image) }}">
          </div>
        </div>
        <div class="form-group" style="padding-bottom:15px;">
          <div class="col-md-2">サイトURL</div>
          <div class="col-md-10">
            <a href="{{ $gear->site_url }}" target="_blank">{{ $gear->site_url }}</a>
          </div>
        </div>
    </div>
    <div class="box-footer">
      <a href="{{ route('gears.index') }}" class="btn btn-default">戻る</a>
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
