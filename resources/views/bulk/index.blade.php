@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
    <table>
      <tr>
        <th>カテゴリー</th>
        <th>在庫</th>
        <th>入出</th>
      </tr>
      @foreach($item as $items)
      <tr>
        <th>{{$items->category_id}}</th>
      </tr>
      <tr>
        <td> <input type="checkbox" id="{{$items->name}}" value="">
          <label for="{{$items->name}}">{{$items->name}}</label></td>
        <td>{{$items->volume}}個</td>
        <td> <input type="number" class="tool" value=""> </td>
      </tr>
      @endforeach
    </table>
@endsection

@section('footer')
<table>
  <tr>
    <a href="http://localhost:8000/bulk/create">登録</a>
    <form  action="/bulk/edit" method="post">
      @csrf
      <input type="submit" value="更新" >
    </form>
    <form  action="/bulk/delete" method="post">
      @csrf
      <input type="submit" value="削除">
    </form>
    <a href="http://localhost:8000/buy_list">買い物リスト</a>
  </tr>
  <tr>
    <a href="http://localhost:8000/stock/index">戻る</a>
  </tr>
    </table>
@endsection
