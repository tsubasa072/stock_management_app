@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

      @if (Auth::check())
      <tr><th>USER: {{$user->name}}</th></tr>
      @endif
      <table>
      <tr>
        <th><a href="http://localhost:8000/user">ユーザー管理</a></th>
      </tr>
      </table>
@endsection

@section('content')

<table>
  <form action="/create/delete" method="post">
    <tr>
      <th><input type="checkbox" name="" value="">
        <a href="http://localhost:8000/bulk">一括</a>
      </th>
      @foreach($item as $items)
      <tr>
        <th><input type="checkbox" name="" value="">
          <a href="">{{$items->category_id}}</a></th>
      </tr>
      @endforeach
  </form>
</table>
@endsection

@section('footer')
<a href="http://localhost:8000/category/create">項目追加</a>
<a href="http://localhost:8000/category/delete">項目削除</a>

@endsection
