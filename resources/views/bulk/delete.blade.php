@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー削除ー
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
        @foreach($food as $key => $val)
        <tr>
          <td><input type="checkbox" id="{{$key}}" name="" value="">
            <label for="{{$key}}">{{$key}}</label></td>
          <td>{{$val}}</td>
          <td><input type="number" class="tool" value="1" step="0.5"></td>
        </tr>

        @endforeach
      <tr>
        <th>キッチン用品</th>
      </tr>
        @foreach($kit as $k => $v)
        <tr>
          <td><input type="checkbox" id="{{$k}}" value="">
            <label for="{{$k}}">{{$k}}</label></td>
          <td>{{$v}}</td>
          <td><input type="number" class="tool" value="1" step="0.5"></td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
<form  action="/bulk/destroy" method="post">
  @csrf
  <a href="http://localhost:8000/bulk">戻る</a>
  <input type="submit" value="削除">
</form>
@endsection
