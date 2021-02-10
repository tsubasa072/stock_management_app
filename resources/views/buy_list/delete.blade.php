@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/buy_list.edit.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
ー削除ー
<form  action="/buy_list/destroy" method="post">
@csrf
<table>
<tr>
  <th>食材</th>
  <th>在庫</th>
  <th>買物</th>
</tr>
@foreach($a as $key => $val)
<tr>
  <td><input type="checkbox" name="name">{{$key}}</td>
  <td>{{$val}}</td>
  <td> <input type="number" name="" value=""> </td>
</tr>
@endforeach
<tr>
  <th>キッチン用品</th>
</tr>
@foreach($b as $key => $val)
<tr>
  <td><input type="checkbox" name="name">{{$key}}</td>
  <td>{{$val}}</td>
  <td> <input type="number" name="" value=""> </td>
</tr>
@endforeach
</table>
@endsection

@section('footer')
<h3>買い物リストを削除しますか？</h3>

  <a href="http://localhost:8000/buy_list">戻る</a>
  <input type="submit" value="削除">
</form>
@endsection
