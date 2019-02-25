<script>
$(function() {
    var table = $("#genre-index").DataTable( {
        searching: true,
        processing : true,
        serverSide : true,
        columnDefs : [
            { "searchable": true, "targets": 0 }
        ],
        oLanguage : {
            sProcessing   : '処理中...',
            sLengthMenu   : '<select class="form-control input-sm">'+
                                '<option value="10">10</option>'+
                                '<option value="20">20</option>'+
                                '<option value="30">30</option>'+
                                '<option value="40">40</option>'+
                                '<option value="50">50</option>'+
                            '</select> 件表示',
            sZeroRecords  : 'データはありません。',
            sInfo         : '<span style="margin:10px;">_START_件～_END_件を表示（全_TOTAL_ 件中）</span>',
            sInfoEmpty    : ' 0 件中 0 から 0 まで表示',
            sInfoFiltered : '（全 _MAX_ 件より抽出）',
            sInfoPostFix  : '',
            sUrl          : '',
            oPaginate     : {
                sFirst    : '先頭',
                sPrevious : '前ページ',
                sNext     : '次ページ',
                sLast     : '最終'
            }
        },
        ajax : {
            url: '{{ route("admin.genres.data") }}',
        },
        columns : [
            { "data": "id", orderable: true },
            { "data": "category", orderable: false },
            { "data": "name", orderable: false },
            { "data": 'id', orderable: false },
        ],
        // 操作セルカスタムコールバック
        fnRowCallback: function(nRow, aData, iDisplayIndex) {
            var addHtml = "";
            var editUrl = "{{ url('genres') }}";
            var deleteUrl = "{{ url('genres/destroy') }}";
            addHtml += '<a class="btn btn-warning" style="margin-right:5px;" href="' + editUrl + '/' + aData.id + '/edit">編集</a>';
            addHtml += '<button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="' + deleteUrl + '/' + aData.id + '">削除</button>';
            $('td:eq(4)', nRow).html(addHtml);
        }
    } ); 

    /*
    $('#myInput').on( 'keyup', function () {
        table.columns(2).search( this.value ).draw();
    });

    $('#information_type').change(function () {
        table.columns(1).search( this.value ).draw();
    })
    */
});
</script>
