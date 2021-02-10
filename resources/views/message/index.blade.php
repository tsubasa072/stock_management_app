@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/message_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      <a href="">全てのメッセージ</a></br>
      <ul><a href="">受信メッセージ</a></ul></br>
      <ul><a href="">送信メッセージ</a></ul></br>
      <ul><a href="">更新メッセージ</a></ul></br>
      <ul><a href="">編集</a></ul>
@endsection

@section('content')
    <table>
    <tr>
      <th>日付</th>
      <th>事項</th>
      <th>更新者</th>
    </tr>
    @foreach($comment as $key=>$val)
    <tr>
     <td>{{$date}}</td>
     <td><input type="checkbox"><a href="#">{{$key}}</a></td>
     <td>{{$val}}</td>
    </tr>
    @endforeach
    </table>
@endsection

@section('footer')
    <form class="" action="/message/edit" method="post">
      @csrf
      <a href="http://localhost:8000/message/create">登録</a>
      <input type="submit" name="" value="更新">
    </form>
    <form class="" action="/message/delete" method="post">
      @csrf
      <input type="submit" name="" value="削除">
    </form>
@endsection
