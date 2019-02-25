@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">ギア一覧</h3>
      <div class="box-body">
        <div class="row">
          {{--
          <form class="form-horizontal" role="form" method="post">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="gears_type">表示タイプ</label>
              <div class="col-sm-4">
                {{ Form::select('type', \App\Models\Information::selectbox(), 1, ['class' => 'form-control', 'id' => 'gears_type']) }}
              </div>
            </div>
          </form>
          --}}
          <div class="pull-right">
            <a href="{{ route('gears.create') }}" class="btn btn-primary">新規作成</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table class="table table-hover" id="gear-index">
        <thead>
        <tr>
          <th>ID</th>
          <th>ブランド</th>
          <th>ジャンル</th>
          <th>名前</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
@include("admin.components.dialog.delete_confirm")
@endsection
@push('js')
@include("admin.gears.datatables")
<script>
  $(document).on('click', '.delete-button', function(e) {
    var route = $(this).data('route');
    $("#delete-form-element").attr("action", route);
  });
</script>
@endpush
