<div class="modal fade" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post" id="delete-form-element">
            {!! csrf_field() !!}
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalTitle">本当に削除しますか？</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                <button type="submit" class="btn btn-primary">はい</button>
            </div>
            </form>
        </div>
    </div>
</div>
