@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/message_delete.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
-削除-
<form  action="/message/destroy" method="post">
  @csrf
<table>
<tr>
  <th>日付</th>
  <th>事項</th>
  <th>更新者</th>
</tr>
@foreach($comment as $key=>$val)
<tr>
 <td>{{$date}}</td>
 <td><input type="checkbox" name="title"><a href="#">{{$key}}</a></td>
 <td>{{$val}}</td>
</tr>
@endforeach
</table>
@endsection


@section('footer')
<h3>このメッセージを 削除 しますか？</h3>

  <a href="http://localhost:8000/message">戻る</a>
  <input type="submit" value="削除">
</form>
@endsection
