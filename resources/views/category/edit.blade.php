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
      
    </table>
@endsection

@section('footer')
<form  action="/category/update" method="post">
  @csrf
  <a href="http://localhost:8000/category">戻る</a>
  <input type="submit" value="更新">
</form>
@endsection
