@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/buy_list.index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection

@section('content')
--買い物リスト--
<table>
  <tr>
    <th>カテゴリー</th>
    <th>在庫</th>
    <th>買物</th>
  </tr>

@foreach($buy_lists as $buy_list)
<tr>
<th>{{ $buy_list->name }}</th>
</tr>

<tr>
    <td>{{ $buy_list->volume }}個</td>
    <td><input type="number" name="" value=""></td>
</tr>


@endforeach
</tr>

</table>

@endsection

@section('footer')
<a href="http://localhost:8000/buy_list/create">登録</a>
<form  action="buy_list/edit" method="post">
  @csrf
  <input type="submit" value="更新" >
</form>
<form  action="buy_list/delete" method="post">
  @csrf
  <input type="submit" value="削除">
</form>

@endsection
