          <a class="btn btn-primary" href="{{ route('admin.platform_account.edit', $admin->id) }}">編集</a>
          <a class="btn btn-primary" href="{{ route('admin.platform_account.show', $admin->id) }}">詳細</a>
          <a class="btn btn-primary" href="{{ route('admin.platform_account.change_password', $admin->id) }}">パスワード変更</a>
          <button type="button" class="btn btn-primary delete-button" data-toggle="modal" data-target="#delete-confirm" data-route="{{ route('admin.platform_account.destroy', $admin->id) }}">削除</button>

