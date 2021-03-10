@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

      @if (Auth::check())
      <tr><th>USER: {{$user->name}}(USER_ID: {{$user->id}})</th></tr>
      @endif
      <table>
      <tr>
        <th><a href="http://localhost:8000/user">ユーザー管理</a></th>
      </tr>
      </table>
      <table>
      <tr>
        <th><a href="http://localhost:8000/message">message</a></th>
      </tr>
      </table>
      <table>
      <tr>
        <th><a href="http://localhost:8000/buy_list">買い物リスト</a></th>
      </tr>
      </table>
@endsection

@section('content')

<table>
    <tr>
      <th>
        <a href="http://localhost:8000/bulk">一括</a>
      </th>
    </tr>
      <form action="/create/delete" method="post">
      @foreach($item as $items)
      <tr>
        <th><input type="checkbox" name="" value="">
          <a href="http://localhost:8000/category">{{$items->name}}</a></th>
      </tr>
      @endforeach
      </form>
</table>
@endsection

@section('footer')
<form class="" action="/stock/delete" method="post">
  @csrf
<a href="http://localhost:8000/stock/create">項目追加</a>
<input type="submit" name="" value="項目削除">
</form>
<a href="" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    Logout
</a>
<form id='logout-form' action="{{ route('logout')}}" method="POST" style="display: none;">
    @csrf
</form>
@endsection
