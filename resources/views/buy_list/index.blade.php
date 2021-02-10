@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/buy_list.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
<table>
  <tr>
    <th>カテゴリー</th>
    <th>在庫</th>
    <th>買物</th>
  </tr>
  <tr>
    <th>お風呂用品</th>
  </tr>
@foreach($list as $key => $val)
  <tr>
    <td> <input type="checkbox">{{$key}}</td>
    <td>{{$val}}</td>
    <td> <input type="number" name="" value=""> </td>
  </tr>
@endforeach
 <tr>
   <th>食材</th>
 </tr>
@foreach($food as $key => $val)
 <tr>
   <td><input type="checkbox">{{$key}}</td>
   <td>{{$val}}</td>
   <td> <input type="number" name="" value=""> </td>
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
