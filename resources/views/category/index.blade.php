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
      <tr>
        <th>食材</th>
      </tr>
      @foreach($foodstuff as $key => $val)
      <tr>
        <td><input type="checkbox" id="{{$key}}" value="">
          <label for="{{$key}}">{{$key}}</label></td>
        <td>{{$val}}</td>
        <td><input type="number" class="tool" step="0.5"></td>
      </tr>
      @endforeach
    </table>


@endsection

@section('footer')
<table>
  <tr>
    <a href="http://localhost:8000/category/create">登録</a>
    <form  action="category/edit" method="post">
      @csrf
      <input type="submit" value="更新" >
    </form>
    <form  action="category/delete" method="post">
      @csrf
      <input type="submit" value="削除">
    </form>
      <a href="http://localhost:8000/buy_list">買い物リスト</a>
  </tr>
</table>

@endsection
