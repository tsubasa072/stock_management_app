@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/message_create.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
@endsection

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
    <form  action="/message/store" method="post">
    @csrf
    <div class="text">
    <table>
      <tr>
        <th>送信先</th> <td><input type="text" name="receive_user_id" value=""></td>
      </tr>
      <tr>
        <th>ユーザー名</th> <td><input type="text" name="send_user_id" value="{{Auth::id()}}"></td>
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
