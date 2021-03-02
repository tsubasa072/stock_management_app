@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
@endsection

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<form  action="/stock/store" method="POST">
  @csrf
  <table>
    <tr>
      <th>カテゴリー名</th>
      <td><input type="text" name="name" value=""></td>
    </tr>
    <tr>
      <th>ユーザーID</th>
      <td><input type="text" name="user_id" value="{{Auth::id()}}"></td>
    </tr>
  </table>

    <a href="http://localhost:8000/stock/index">戻る</a>
    <input type="submit"  value="登録">
</form>

@endsection

@section('footer')


@endsection
