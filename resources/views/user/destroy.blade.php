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
          <td> <input type="text" name="input" value="{{$input}}"> </td>
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
  <tr>
    @if(isset($item))
    <td>{{$item->first_name}}{{$item->last_name}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <form class="" action="index.html" method="post">
    <td> <input type="submit" name="" value="使用解除"> </td>
    </form>
    @endif
  </tr>
  @foreach ($use as $value)
  <tr>
    <td>{{$value->first_name}}{{$value->last_name}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <form class="" action="index.html" method="post">
    <td> <input type="submit" name="" value="使用解除"> </td>
    </form>
  </tr>
  @endforeach

</table>

@endsection

@section('footer')
<a href="">使用者一覧</a>
<a href="">リクエスト一覧</a>

@endsection
