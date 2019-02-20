{{-- resources/views/emails/user_confirm.blade.php --}}

@extends('emails.template.master')

@section('content')
<table>
 <tr>
  <td>

   <h2>campbug ユーザー登録確認</h2>

   <p>
    ようこそ、<span class="important">{{ $user->name }}</span> さん
   </p>
   <br>
   <p>
    ユーザー登録を完了する為に<br>
    下の写真をクリックしてcampbugに"camp in"してください。
   </p>
   
   <a href="{{ route('register.confirm.mail', ['verified' => $user->mail_verified_hash]) }}">登録完了</a>

{{ $user->email }}

  </td>
 </tr>
</table>
@endsection









