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
          <form class="" action="/user" method="post">
            @csrf
          <td> <input type="text" name="" value=""> </td>
          <td> <input type="submit" name="" value="検索"> </td>
          </form>
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

  @foreach($item as $items)
  <tr>
    @foreach($users as $user)
      @if ($user->id == $items->user_id)
        <td>{{$user->first_name}} {{$user->last_name}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      @endif
    @endforeach
    <form class="" action="index.html" method="post">
    <td> <input type="submit" name="" value="承認する">
    <input type="submit" name="" value="承認しない"> </td>
    </form>
  </tr>
  @endforeach

</table>

@endsection

@section('footer')
<a href="">使用者一覧</a>
<a href="">リクエスト一覧</a>

@endsection
