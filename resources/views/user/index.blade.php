@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/user_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      <table>
        <tr>
          <th>ユーザー検索</th>
        </tr>
        <tr>
          <td> <input type="text" name="" value=""> </td>
          <td> <input type="submit" name="" value="検索"> </td>
        </tr>
      </table>
@endsection

@section('content')
<table>
  <tr>
    <th>ユーザー一覧</th>
  </tr>
  <tr>
    <th>名前</th>
    <th>ユーザー名</th>
    <th>アドレス</th>
  </tr>
  <tr>
    @foreach($user as $key => $val)
    <td>{{$key}}</td>
    <td>{{$val}}</td>
    @endforeach
    <td>hirow-oyakou@ex</td>
    <form class="" action="index.html" method="post">
    <td> <input type="submit" name="" value="リクエスト"> </td>
    </form>
  </tr>
</table>

@endsection

@section('footer')
<a href="http://localhost:8000/user/destroy">使用者一覧</a>
<a href="http://localhost:8000/user/store">リクエスト一覧</a>

@endsection
