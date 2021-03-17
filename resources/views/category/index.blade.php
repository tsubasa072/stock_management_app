@extends('layouts.stockapp')
<link rel="stylesheet" href="{{ asset('/css/bulk_index.css') }}">
@section('title','在庫管理')

@section('menubar')
      @parent

@endsection


@section('content')
<form  action="category/edit" method="post">
  @csrf
    <table>
      <tr>
        <th>カテゴリー</th>
        <th>在庫</th>
        <th>入出</th>
      </tr>
      <tr>
        @foreach($categories as $category)
        <th>{{$category->name}}</th>
      </tr>
        @endforeach
       <tr>
         <td>{{$stocks->name}}</td>
         <td>{{$stocks->volume}}個</td>
         <td> <input type="number" class="tool" name="volume" value=""> </td>
       </tr>


    </table>
    <table>
      <tr>
          <input type="submit" value="更新">
          <a href="http://localhost:8000/category/delete">削除</a>
          <a href="http://localhost:8000/buy_list">買い物リスト</a>
      </tr>
    </table>
</form>

@endsection

@section('footer')
<form action="category/create" method="post">
  @csrf
  <input type="submit" name="" value="登録">
</form>

@endsection
