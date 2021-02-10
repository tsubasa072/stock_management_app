@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
@section('title','新規登録')

@section('menubar')
      @parent
@endsection

@section('content')
<form  action="/stock/store" method="POST">
  @csrf
  <table>
    <tr>
      <th>名前</th>
      <td><input type="text" name="first_name" value=""><br></td>
      <td><input type="text" name="last_name" value=""><br></td>
    </tr>
    <tr>
      <th>ユーザー名</th>
      <td><input type="text" name="name" value=""><br></td>
    </tr>
    <tr>
      <th>アドレス</th>
      <td><input type="text" name="email" value=""><br></td>
    </tr>
    <tr>
      <th>passeord</th>
      <td><input type="password" name="password" value=""></td>
    </tr>
  </table>

    <a href="http://localhost:8000/stock">戻る</a>
    <input type="submit"  value="登録">
</form>

@endsection

@section('footer')


@endsection
