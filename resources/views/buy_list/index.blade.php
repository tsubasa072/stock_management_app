@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/buy_list.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
--買い物リスト--
<table>
  <tr>
    <th>カテゴリー</th>
    <th>在庫</th>
    <th>買物</th>
  </tr>
  @foreach($item as $items)
  <tr>
    <th>{{$items->category_id}}</th>
  </tr>

  <tr>
    <td>{{$items->name}}</td>
    <td>{{$items->volume}}</td>
    <td> <input type="number" id="tool" value=""> </td>
  </tr>

  @endforeach
</table>

@endsection

@section('footer')
<a href="http://localhost:8000/buy_list/create">登録</a>
<form  action="buy_list/edit" method="post">
  @csrf
  <input type="submit" value="更新" >
</form>
<form  action="buy_list/delete" method="post">
  @csrf
  <input type="submit" value="削除">
</form>
<a href="">戻る</a>
@endsection
