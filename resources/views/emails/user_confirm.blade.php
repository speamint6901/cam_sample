{{-- resources/views/emails/user_confirm.blade.php --}}

@extends('emails.template.master')

@section('content')
<table>
 <tr>
  <td>

   <h2>ユーザー登録確認</h2>



   <p style="text-align: center;">
    ようこそ、<span class="important">{{ $user->name }}</span> さん
   </p>
   <br>
   <p style="text-align: center;">{{ $user->email }}</p>
   <br>
   <p style="text-align: center;">
    ユーザー登録を完了する為に<br>
    下の写真をクリックしてcampbugに"camp in"してください。
   </p>

  </td>
 </tr>
</table>
@endsection

@section('addcontents')
<table class="common_content-wrap" bgcolor="#FFFFFF">
 <tr align="center">
  <a href="{{ route('register.confirm.mail', ['verified' => $user->mail_verified_hash]) }}">
   <img src="{{ asset('img/mail/mail_main-registconfirm.jpg') }}" alt="hammocks CAMP IN">
  </a>
 </tr>
</table>
@endsection







