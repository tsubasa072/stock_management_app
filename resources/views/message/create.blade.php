@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/message_create.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
@endsection

@section('content')
    <form  action="/message/store" method="post">
    @csrf
    <div class="text">
    <table>
      <tr>
        <input type="hidden" name="receive_user_id" value="">
      </tr>
      <tr>
        <th>ユーザー名</th> <td><input type="text" name="send_user_id" value=""></td>
      </tr>
      <tr>
        <th>題名</th> <td><input type="text" name="title" value=""></td>
      </tr>
      <tr>
        <th>コメント</th> <td><textarea name="comment" rows="8" cols="80"></textarea></td>
      </tr>
    </table>
    </div>


      <a href="http://localhost:8000/message">戻る</a>
      <input type="submit" value="登録">
    </form>


@endsection

@section('footer')


@endsection
