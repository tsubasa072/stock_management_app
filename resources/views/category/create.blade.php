@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/stock.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent
@endsection

@section('content')
<form  action="/category/store" method="POST">
  @csrf
  <table>
    <tr>
      
      <td><input type="hidden" name="category_id[{{ $category->id }}]" value="{{ $category->id }}"></td>
    </tr>
    <tr>
      <th>登録名</th>
      <td><input type="text" name="name" value=""></td>
    </tr>
    <tr>
      <th>数量</th>
      <td><input type="number" name="volume" value=""></td>
    </tr>
    <tr>
      <th>ユーザー名</th>
      <td><input type="text" name="user_id" value="{{Auth::id()}}"></td>
    </tr>
  </table>

    <a href="http://localhost:8000/category">戻る</a>
    <input type="submit"  value="登録">
</form>

@endsection

@section('footer')


@endsection
