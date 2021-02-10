@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
@section('title','ログイン')

@section('menubar')
      @parent
@endsection

@section('content')
    <form  action="/hello" method="POST">
      <table>
        <tr>
          <th>アドレス</th>
          <td><input type="text" name="address" value=""><br></td>
        </tr>
        <tr>
          <th>passeord</th>
          <td><input type="password" name="pass" value=""></td>
        </tr>
      </table>
    </form>
    <form  action="index" method="post">
      <a href="http://localhost:8000/stock">戻る</a>
      <input type="submit" value="ログイン">
    </form>

@endsection

@section('footer')


@endsection
