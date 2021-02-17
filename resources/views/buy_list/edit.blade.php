@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/buy_list.edit.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
ー更新ー
<form  action="/buy_list/update" method="post">
  @csrf
<table>
  <tr>
    <th>カテゴリー</th>
    <th>在庫</th>
    <th>買物</th>
  </tr>

</table>
@endsection

@section('footer')
<h3>買い物リストを更新しますか？</h3>

  <a href="http://localhost:8000/buy_list">戻る</a>
  <input type="submit" value="更新">
</form>
@endsection
