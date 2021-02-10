@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
      ー更新ー
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
        <td><input type="number" class="tool" value="" step="0.5"><td>
      </tr>
      @endforeach
        <tr>
          <th>キッチン用品</th>
        </tr>
        @foreach($kit as $k => $v)
          <tr>
            <td><input type="checkbox" id="{{$k}}" name="" value="">
              <label for="{{$k}}">{{$k}}</label></td>
            <td>{{$v}}</td>
            <td><input type="number" class="tool" value="" step="0.5"></td>
          </tr>
        @endforeach
    </table>
@endsection

@section('footer')
<form  action="/bulk/update" method="post">
  @csrf
  <a href="http://localhost:8000/bulk">戻る</a>
  <input type="submit" value="更新">
</form>
@endsection
