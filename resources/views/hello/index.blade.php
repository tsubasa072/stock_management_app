@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/show.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      <table>
      <tr>
        <th><a href="http://localhost:8000/user">ユーザー管理</a></th>
      </tr>
      </table>
@endsection

@section('content')
<table>
  <form class="" action="index.html" method="post">
    <tr>
      <th><input type="checkbox" name="" value="">
        <a href="http://localhost:8000/bulk">一括</a>
      </th>
      <th><input type="checkbox" name="" value=""><a href="">カテゴリ</a></th>
      <th><input type="checkbox" name="" value=""><a href="">カテゴリ</a></th>
    </tr>
    <tr>
      <th><input type="checkbox" name="" value=""><a href="">カテゴリ</a></th>
      <th><input type="checkbox" name="" value=""><a href="">カテゴリ</a></th>
      <th><input type="checkbox" name="" value=""><a href="">カテゴリ</a></th>
    </tr>
  </form>
</table>
@endsection

@section('footer')
<a href="http://localhost:8000/category/create">項目追加</a>
<a href="http://localhost:8000/category/delete">項目削除</a>

@endsection
