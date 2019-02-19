確認メールです

{{ $user->name }}
{{ $user->email }}

<a href="{{ route('register.confirm.mail', ['verified' => $user->mail_verified_hash]) }}">登録完了</a>


